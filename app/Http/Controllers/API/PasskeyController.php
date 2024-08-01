<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Api\GetPasswordRequest;
use App\Http\Requests\Api\BrowserRequest;
use App\Http\Requests\Api\UpdatePasskey;
use App\Http\Requests\Api\LoginPasskey;
use App\Http\Requests\Api\StorePasskey;
use App\Http\Requests\Api\ListPasskey;
use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\VerifyOTP;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserTwoFactorOtpEmail;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Api\GetOTP;
use App\Models\UserHsmSignatures;
use App\Models\BrowserExtension;
use App\Models\PlatformAccount;
use App\Helpers\HsmCloudHelper;
use Illuminate\Support\Carbon;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UserRole;
use App\Models\User;

class PasskeyController extends Controller
{

    /**
     * Login Passkey
     *
     * @param  mixed $request
     **/
    public function loginPasskey(LoginPasskey $request)
    {

        Log::info('first');
        Log::info($request->all());
        if (Str::contains($request->email, '@')) {
            $authArr = ['email' => $request->email, 'password' => $request->password];
        } else {
            $authArr = ['employeeId' => $request->email, 'password' => $request->password];
        }

        Log::info('second');
        Log::info(Auth::attempt($authArr));

        if (Auth::attempt($authArr)) {
            $user = Auth::user();

            $accessDetail = CommonHelper::getUserAccessDetails();
            $browser =  CommonHelper::getClientBrowserName();

            Log::info('third accessDetail');
            Log::info($accessDetail);

            Log::info('third browser');
            Log::info($browser);

            Log::info('third user');
            Log::info($user);

            if (($user->role == 'user') && !in_array($browser, json_decode($accessDetail['browser']))) {
                Auth::logout();
                return $this->toJson([], trans('messages.member.browser_denied'), 0);
            }

            if ($user->isVerified == 0) {
                Auth::logout();
                return $this->toJson([], trans('api.passkey_login.is_verify'), 0);
            }
            if ($user->active == 0) {
                Auth::logout();
                return $this->toJson([], trans('api.passkey_login.is_active'), 0);
            }

            $userCheck = User::orderBy('hardwareAccessNo', 'desc')->value('hardwareAccessNo');

            $user->hardwareAccessNo = $userCheck + 1;
            $user->lastLogin = Carbon::now();
            $user->save();

            $token    = $user->createToken(config('app.name'))->accessToken;

            $customRole = UserRole::where('userId', $user->id)->with('getUserRole')->first();

            return $this->toJson([
                'userDetail' => $user,
                'roleDetail' => $customRole,
                'accessToken' => $token,
            ], trans('api.passkey_login.success'));
        }
        return $this->toJson([], trans('api.passkey_login.error'), 0);
    }


    /**
     * Store Passkey
     *
     * @param StorePasskey $request
     * @return Json
     **/
    public function storePasskey(StorePasskey $request)
    {
        $user = Auth::user();

        $alredyExist = PlatformAccount::where(['userId' => $user->id, 'platform' => $request->platform, 'accountId' => $request->accountId])->first();
        if ($alredyExist) {
            return $this->toJson([], trans('api.passkey.store_or_update', ['module' => 'added']), 1);
        }

        $noOfApplications = PlatformAccount::where('userId', $user->id)->groupBy('platform')->count();
        $noOfpasswords = PlatformAccount::where('userId', $user->id)->count();
        $accessDetail = CommonHelper::getUserAccessDetails();

        if (($user->role == 'business') && ($accessDetail['noOfApplications'] == $noOfApplications)) {
            return $this->toJson([], trans('messages.member.application_limit'), 0);
        }

        if ($user->role == 'user') {
            if ($accessDetail['noOfApplications'] == $noOfApplications) {
                return $this->toJson([], trans('messages.member.application_limit'), 0);
            }

            if ($accessDetail['numberPassword'] == $noOfpasswords) {
                return $this->toJson([], trans('messages.member.password_limit'), 0);
            }

            $os =  CommonHelper::getOperatingSystem();
            if (!in_array($os, json_decode($accessDetail['noOfDevices']))) {
                return $this->toJson([], trans('messages.member.os_limit'), 0);
            }

            $browser =  CommonHelper::getClientBrowserName();
            if ($accessDetail['browser'] && !in_array($browser, json_decode($accessDetail['browser']))) {
                return $this->toJson([], trans('messages.member.browser_limit'), 0);
            }

            if ($accessDetail['application']) {
                $collection = collect(json_decode($accessDetail['application']));
                // Use the pluck method to extract the "value" property into a new array
                $applicationArray = $collection->pluck('value')->toArray();
                $restricted = CommonHelper::getAccessOfApplicationByUrl($request->accountUrl, $applicationArray);

                if ($restricted == true) {
                    return $this->toJson([], 'Application restricted!', 0);
                }
            }
        }


        if ($user->primaryHsmId) {
            $validatedData = $request->validated();
            $mergedData = array_merge($validatedData, ['userId' => $user->id, 'ipAddress' => $request->ip(), 'hsmId' => $user->primaryHsmId, 'passwordSize' => strlen($request->password)]);
            $store = PlatformAccount::create($mergedData);

            if ($store) {

                $signature = HsmCloudHelper::createPassword($user->id, $user->primaryHsmId, $request->password);
                if ($signature['status'] == false) {
                    PlatformAccount::where('id', $store->id)->delete();
                    return $this->toJson([], "There is some problem with HSM! Please try again later.", 0);
                }
                if ($signature) {
                    PlatformAccount::where('id', $store->id)->update(['passwordSignature' => $signature['passwordsignature']]);
                }


                CommonHelper::passwordStorageInfo($user, $request->password);
                // ADD Activity LOG
                $description = 'User ' . $user->email . ' upload password';
                CommonHelper::auditLog($request->accountUrl, $description, $request->accessMode ?? null, $request->password, $request->browser);

                return $this->toJson([], trans('api.passkey.store_or_update', ['module' => 'added']), 1);
            }

            return $this->toJson([], trans('api.passkey.store_or_update_error'), 0);
        }
        return $this->toJson([], trans('api.passkey.hsm_error'), 0);
    }



    /**
     * Update Passkey
     *
     * @param  UpdatePasskey $request
     * @return void
     **/
    public function updatePasskey(UpdatePasskey $request)
    {
        $user = Auth::user();

        $updatePasskey = PlatformAccount::where(['userId' => $user->id, 'platform' => $request->platform, 'accountId' => $request->accountId])->first();

        if ($updatePasskey) {

            $passwordSignatureExist =  UserHsmSignatures::where(['userId' => $user->id, 'hsmId' => $updatePasskey->hsmId])->first();
            if ($passwordSignatureExist) {
                HsmCloudHelper::updatePassword($user->id, $updatePasskey->hsmId, $request->password, $updatePasskey->passwordSignature);
            }

            $updatePasskey->update(['title' => $request->title, 'password' => $request->password, 'ipAddress' => $request->ip()]);


            // ADD Activity LOG
            $description = 'User ' . $user->email . ' update password';
            CommonHelper::auditLog($updatePasskey->accountUrl, $description, null, $request->password, $browser = null);

            return $this->toJson([], trans('api.passkey.store_or_update', ['module' => 'updated']), 1);
        }
        return $this->toJson([], trans('api.passkey.update_error'), 0);
    }


    /**
     * Get List Of Passkey By AccountId
     *
     * @param  ListPasskey $request
     * @return void
     **/
    public function listPasskey(ListPasskey $request)
    {
        $user = Auth::user();

        $listPasskey = PlatformAccount::where(['platform' => $request->platform, 'userId' => $user->id])->orderBy('createdAt', 'desc')->get();

        if ($listPasskey) {
            return $this->toJson(["credentials" => $listPasskey], trans('api.passkey.get_list'), 1);
        }
        return $this->toJson([], trans('api.passkey.get_list_error'), 0);
    }


    /**
     * Get OTP on Mobile | Email
     *
     * @param  OTP $request
     * @return void
     **/
    public function getOtp(GetOTP $request)
    {
        try {
            $user = Auth::user();

            if ($user) {
                $otp  = rand(100000, 999999);

                $user->update(['keyManagerOTP' => $otp, 'keyManagerExpiry' => Carbon::now()]);

                if ($request->type == "Email") {
                    $value = $user->mfaEmail ? $user->mfaEmail : $user->email;

                    $user = User::where(['keyManagerOTP' => $otp])
                        ->where(function ($query) use ($value) {
                            $query->where('mfaEmail', $value)
                                ->orwhere('email', $value);
                        })->first();

                    Mail::to($value)->send(new UserTwoFactorOtpEmail($user));
                    return $this->toJson([], trans('messages.login.send_otp'), 1);
                }

                $valueNumber = $user->mfaMobileNumber ? $user->mfaMobileNumber : $user->mobileNumber;
                CommonHelper::sendOtpMobile($otp, $valueNumber);
                return $this->toJson([], trans('messages.login.send_otp_mobile'), 1);
            }
            return $this->toJson([], trans('messages.login.otp_error'), 0);
        } catch (\Exception $th) {
            return $this->toJson([], trans('messages.login.otp_error'), 0);
        }
    }


    /**
     * Verify OTP on Mobile | Email
     *
     * @param  OTP $request
     * @return void
     **/
    public function verifyOtp(VerifyOTP $request)
    {
        $user = Auth::user();

        if ($user->keyManagerOTP == $request->otp) {
            $startTime = Carbon::parse($user->keyManagerExpiry);
            $endTime = Carbon::parse(now());
            $minutesDifference = $startTime->diffInMinutes($endTime);
            if ($minutesDifference >= 1) {
                $user->keyManagerOTP = null;
                $user->keyManagerExpiry = null;
                $user->save();
                return $this->toJson([], "OTP expired!", 0);
            }
            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->save();

            return $this->toJson([], trans('messages.login.otp_verify'), 1);
        }

        return $this->toJson([], trans('messages.login.invalid_otp'), 0);
    }



    /**
     * Verify OTP on Mobile | Email
     *
     * @param  OTP $request
     * @return void
     **/
    public function authenticationAppOtp(VerifyOTP $request)
    {
        $user = Auth::user();

        if (empty($user->google2fa_secret)) {
            return $this->toJson([], "Please authenticate first!", 0);
        }

        $authVerify = AuthenticationHelper::validateAuthentication($request->otp);
        if ($authVerify == true) {
            return $this->toJson([], trans('messages.login.otp_verify'), 1);
        }

        return $this->toJson([], trans('messages.login.invalid_otp'), 0);
    }


    /**
     * Varify face is valide or not
     *
     * @param  mixed $request
     * @return json
     **/
    public function verifyFace(Request $request)
    {
        $flag = AuthenticationHelper::faceVerify($request);

        if ($flag['status'] == true) {
            return $this->toJson([], $flag['message'], 1);
        }

        return $this->toJson([], $flag['message'], 0);
    }


    /**
     * BrowserExtension
     *
     * @param  OTP $request
     * @return void
     **/
    public function browserExtension(BrowserRequest $request)
    {
        $user = Auth::user();

        $accessDetail = CommonHelper::getUserAccessDetails();

        $countExtension = BrowserExtension::where('userId', $user->id)->groupby('browserType')->count();

        if (($user->role == 'business') && ($accessDetail['noOfExtensions'] == $countExtension)) {
            return $this->toJson([], "limit is over!", 0);
        }

        if ($user->role == 'user') {
            $browser =  CommonHelper::getClientBrowserName();
            if ($accessDetail['browser'] && !in_array($browser, json_decode($accessDetail['browser']))) {
                return $this->toJson([], "limit is over!", 0);
            }
        }


        $storeData = [
            'userId' => $user->id,
            'systemName' => $request->systemName,
            'systemType' => $user->systemType,
            'ipAddress' => $request->ip(),
            'browserType' => CommonHelper::getClientBrowserName() ?? null
        ];
        $browserData = BrowserExtension::create($storeData);


        if ($browserData) {
            return $this->toJson([], trans('messages.browser.store'), 1);
        }

        return $this->toJson([], trans('messages.browser.error'), 0);
    }



    /**
     * BrowserExtension
     *
     * @param  OTP $request
     * @return void
     **/
    public function userAuthArray()
    {
        $user = Auth::user();

        $customRole = UserRole::where('userId', $user->id)->with('getUserRole')->first();

        $authentication = [];
        if ($user->google2fa_secret) {
            $authentication[] = 'Authentication App';
        }
        if (($user->mfaEmail || $user->mfaMobileNumber) && ($user->isKeyManagerOTP == 1)) {
            $authentication[] = 'Mobile/Email OTP';
        }
        if ($user->faceIdImage) {
            $authentication[] = 'Face ID';
        }

        $mfaAllocated = $customRole ? $customRole['getUserRole']->authentication : [];

        if (count($mfaAllocated) == 4) {
            $mfaAllocated[] = 'Passkey';
        }

        if ($user->role == "business") {
            $mfaAllocated = [
                'Face ID',
                'Mobile/Email OTP',
                'Fingerprint',
                'Authentication App',
                'Passkey',
            ];
        }
        return $this->toJson(['authentication' => $authentication, 'mfaAllocated' => $mfaAllocated], trans('messages.authArray.get'), 1);
    }


    /**
     * Update Status Of Automatically Upload
     * @param $request
     **/
    public function updateAutomaticallyUpload(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->update(['automaticallyUpload' => $request->status]); // Adjust the model and column accordingly
            return $this->toJson(['automaticallyUpload' => $request->status], ($request->status == 1) ? 'Automatically upload has been enabled successfully.' : 'Automatically upload has been disabled successfully.', 1);
        }
        return $this->toJson([], 'There are some problem to update status. Please try again later!', 0);
    }

    /**
     * Get Automatically Upload Status
     * @param $request
     **/
    public function getAutomaticallyUploadStatus()
    {
        $user = Auth::user();
        if ($user) {
            return $this->toJson(['automaticallyUpload' => $user->automaticallyUpload], 'Automatically upload status fetch successfully.', 1);
        }
        return $this->toJson([], 'There are some problem to update status. Please try again later!', 0);
    }



    /**
     * Check Browser Extension
     * @param $request
     **/
    public function browserExtensionCheck(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $browserName = CommonHelper::getClientBrowserName();
            $browserData = BrowserExtension::where(['userId' => $user->id, 'browserType' => $browserName])->orderBy('createdAt', 'desc')->first();
            if ($browserData) {
                $browserData->update(['isInstalled' => 1, 'isActive' => 1]);
                return $this->toJson([], 'Extension installed.', 1);
            }
            return $this->toJson([], 'No device added!', 0);
        }
        return $this->toJson([], 'There are some problem to update status. Please try again later!', 0);
    }


    /**
     * get logo
     *
     * @param  mixed $request
     * @return void
     */
    public function getLogo(Request $request)
    {
        $ogImage = CommonHelper::getOGImage($request->accountUrl);
        return $this->toJson(['link' => $ogImage], '', 1);
    }


    /**
     * Get Password Cloud HSM
     * @param $request
     **/
    public function getPassword(GetPasswordRequest $request)
    {
        $user = Auth::user();
        Log::info('GetPassword-Request------>' . json_encode($request->all()));
        if ($user) {
            $platformData = PlatformAccount::where('id', $request->platformId)->first();
            if ($platformData) {
                $getPass = HsmCloudHelper::getPassword($user->id, $platformData->hsmId, $platformData->passwordSignature);
                Log::info('GetPassword-RESPONSE---OUT--->' . json_encode($getPass));
                if ($getPass['status']) {
                    Log::info('GetPassword-RESPONSE--IN---->' . json_encode($getPass));
                    return $this->toJson(['password' => $getPass['password']], 'Password has been fetched successfully.', 1);
                }
                return $this->toJson(['password' => ''], 'Unable to fetched password!', 0);
            }
            return $this->toJson([], 'No record found!', 0);
        }
        return $this->toJson([], 'There are some problem to update status. Please try again later!', 0);
    }
}
