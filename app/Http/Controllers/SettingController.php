<?php

namespace App\Http\Controllers;

use App\Helpers\AuthenticationHelper;
use App\Models\Password;
use App\Services\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChangePassword;
use App\Http\Requests\UpdateProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\ProductTransactions;
use App\Mail\UserTwoFactorOtpEmail;
use App\Helpers\CommonHelper;
use App\Helpers\StripeHelper;
use Illuminate\Http\Request;
use App\Models\HsmsTools;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class SettingController extends Controller
{
    protected SettingsService $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function index(): View
    {
        $data = $this->settingsService->getAuthenticatorData();

        return view('user.setting.index', ['user' => $data['user'], 'QR_Image' => $data['QR_Image'], 'secret' => $data['secret'], 'gid' => $data['gid']]);
    }

    public function updateProfile(UpdateProfile $request): RedirectResponse
    {
        $updateResult = $this->settingsService->updateProfile($request);

        if ($updateResult) {
            return redirect()->back()->with('success', trans('messages.profile.update.success'));
        }
        return redirect()->back()->with('error', trans('messages.profile.update.error'));
    }

    public function updateFullname(Request $request): RedirectResponse
    {
        if ($request->fullname) {
            if (User::where('id', Auth::id())->update(['fullname' => $request->fullname])) {
                return redirect()->back()->with('success', trans('messages.profile.update.success'));
            }

            return redirect()->back()->with('error', trans('messages.profile.update.error'));
        }
        return redirect()->back()->with('error', 'Please, enter your name');
    }

    public function updateEmailAddress(Request $request): RedirectResponse
    {
        if ($request->email) {
            if (User::where('id', Auth::id())->update(['email' => $request->email])) {
                return redirect()->back()->with('success', trans('messages.profile.update.success'));
            }

            return redirect()->back()->with('error', trans('messages.profile.update.error'));
        }
        return redirect()->back()->with('error', 'Please, enter your email');
    }

    public function changeTwoFactorStatus(): JsonResponse
    {
        $result = $this->settingsService->changeTwoFactorStatus();

        return $this->toJson([], $result['message'], $result['status']);
    }

    public function deleteUserTwoFactorAuth(Request $request): JsonResponse
    {
        $result = $this->settingsService->deleteUserTwoFactorAuth($request->all());

        return $this->toJson([], $result['message'], $result['status']);
    }

    public function changePassword(ChangePassword $request): RedirectResponse
    {
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            $user->password = $request->new_password;
            $user->password_hint = $request->password_hint ?? '';

            if ($user->save()) {
                return redirect()->back()->with('success', trans('messages.change_password.success'));
            }
            return redirect()->back()->with('error', trans('messages.change_password.error'));
        }
        return redirect()->back()->with('error', trans('messages.change_password.old_password_error'));
    }

    public function deleteAccount(): RedirectResponse
    {
        $user = Auth::user();

        if ($user && Auth::logout()) {
            if ($user->delete()) {
                return redirect()->route('login')->with('success', 'Your account has been deleted.');
            }
        }

        return redirect()->back()->with('error', 'Something went wrong, please try again later.');
    }

    public function checkMfaUserOpt(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if (is_array($request->otp)) {
            $request->otp = implode('', $request->otp);
        }

        $startTime = Carbon::parse($user->keyManagerExpiry);
        $endTime = Carbon::parse(now());
        $minutesDifference = $startTime->diffInMinutes($endTime);
        if ($minutesDifference >= 1) {
            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->mfaEmail = null;
            $user->mfaMobileNumber = null;
            $user->save();
            return redirect()->back()->with('error', "OTP expired!");
        }

        if ($user->keyManagerOTP === $request->otp) {

            if (isset($request->mfaEmail) && ($user->mfaEmail != $request->mfaEmail)) {
                return redirect()->back()->with('error', "Invalid email");
            }
            if (isset($request->mfaMobileNumber) && ($user->mfaMobileNumber != $request->mfaMobileNumber)) {
                return redirect()->back()->with('error', "Invalid mobile number");
            }

            if (empty($request->mfaEmail)) {
                $user->mfaEmail = $user->email;
            }

            if (empty($request->mfaMobileNumber)) {
                $user->mfaMobileNumber = $user->mobileNumber;
            }

            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->isKeyManagerOTP = 1;
            $user->save();
            return redirect()->back()->with('success', trans('messages.login.otp_verify'));
        }

        return redirect()->back()->with('error', trans('messages.login.invalid_otp'));
    }

    public function sendMfaOtpUser(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            if ($request->ajax()) {
                $otp = rand(100000, 999999);
                $user->keyManagerOTP = $otp;
                $user->keyManagerExpiry = Carbon::now();

                if ($request->contactType == "Email") {
                    if (empty($request->contactValue)) {
                        return $this->toJson([], 'Email is required', 0);
                    }
                    Mail::to($request->contactValue)->send(new UserTwoFactorOtpEmail($user));
                    $user->mfaEmail = $request->contactValue;
                    $user->save();
                    return $this->toJson([], trans('messages.login.send_otp'), 1);
                }
                if (empty($request->contactValue)) {
                    return $this->toJson([], 'Mobile number is required', 0);
                }
                $user->mfaMobileNumber = $request->contactValue;
                CommonHelper::sendOtpMobile($otp, $request->contactValue);
                $user->save();
                return $this->toJson([], trans('messages.login.send_otp_mobile'), 1);
            }

            return $this->toJson([], trans('messages.login.otp_error'), 0);
        } catch (\Exception $th) {
            return $this->toJson([], trans('messages.login.otp_error'), 0);
        }
    }

    public function checkMfaUserOptJson(Request $request): JsonResponse
    {
        $user = Auth::user();

        if (is_array($request->otp)) {
            $request->otp = implode('', $request->otp);
        }

        $startTime = Carbon::parse($user->keyManagerExpiry);
        $endTime = Carbon::parse(now());
        $minutesDifference = $startTime->diffInMinutes($endTime);
        if ($minutesDifference >= 1) {
            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->save();
            return $this->toJson([], trans('messages.login.otp_verify'), 0);
        }

        if ($user->keyManagerOTP === $request->otp) {

            if (isset($request->mfaEmail) && ($user->mfaEmail != $request->mfaEmail)) {
                return $this->toJson([], "Invalid email", 0);
            }
            if (isset($request->mfaMobileNumber) && ($user->mfaMobileNumber != $request->mfaMobileNumber)) {
                return $this->toJson([], 'Invalid mobile number', 0);
            }

            if (empty($request->mfaEmail)) {
                $user->mfaEmail = $user->email;
            }

            if (empty($request->mfaMobileNumber)) {
                $user->mfaMobileNumber = $user->mobileNumber;
            }

            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->save();

            return $this->toJson([], trans('messages.login.otp_verify'), 1);
        }

        return $this->toJson([], trans('messages.login.invalid_otp'), 0);
    }

    public function checkTwoFactorUserOpt(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if (is_array($request->otp)) {
            $request->otp = implode('', $request->otp);
        }

        $startTime = Carbon::parse($user->keyManagerExpiry);
        $endTime = Carbon::parse(now());
        $minutesDifference = $startTime->diffInMinutes($endTime);
        if ($minutesDifference >= 1) {
            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->twoFactorEmail = null;
            $user->twoFactorMobileNumber = null;
            $user->save();
            return redirect()->back()->with('error', "OTP expired!");
        }

        if ($user->keyManagerOTP === $request->otp) {

            if (isset($request->twoFactorEmail) && ($user->twoFactorEmail != $request->twoFactorEmail)) {
                return redirect()->back()->with('error', "Invalid email");
            }
            if (isset($request->twoFactorMobileNumber) && ($user->twoFactorMobileNumber != $request->twoFactorMobileNumber)) {
                return redirect()->back()->with('error', "Invalid mobile number");
            }

            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->save();
            return redirect()->back()->with('success', trans('messages.login.otp_verify'));
        }

        return redirect()->back()->with('error', trans('messages.login.invalid_otp'));
    }

    public function checkTwoFactorUserOptJson(Request $request): JsonResponse
    {
        $user = Auth::user();

        if (is_array($request->otp)) {
            $request->otp = implode('', $request->otp);
        }

        $startTime = Carbon::parse($user->keyManagerExpiry);
        $endTime = Carbon::parse(now());
        $minutesDifference = $startTime->diffInMinutes($endTime);
        if ($minutesDifference >= 1) {
            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->save();

            return $this->toJson([], "OTP expired!", 0);
        }

        if ($user->keyManagerOTP === $request->otp) {

            if (isset($request->twoFactorEmail) && ($user->twoFactorEmail != $request->twoFactorEmail)) {
                return $this->toJson([], "Invalid email", 0);
            }
            if (isset($request->twoFactorMobileNumber) && ($user->twoFactorMobileNumber != $request->twoFactorMobileNumber)) {
                return $this->toJson([], "Invalid mobile number", 0);
            }

            if (empty($request->twoFactorEmail)) {
                $user->twoFactorEmail = $user->email;
            }

            if (empty($request->twoFactorMobileNumber)) {
                $user->twoFactorMobileNumber = $user->mobileNumber;
            }

            $user->keyManagerOTP = null;
            $user->keyManagerExpiry = null;
            $user->save();
            return $this->toJson([], trans('messages.login.otp_verify'), 1);
        }

        return $this->toJson([], trans('messages.login.invalid_otp'), 0);
    }

    public function sendTwoFactorOtpUser(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            if ($request->ajax()) {
                $otp = rand(100000, 999999);
                $user->keyManagerOTP = $otp;
                $user->keyManagerExpiry = Carbon::now();

                if ($request->contactType == "Email") {
                    if (empty($request->contactValue)) {
                        return $this->toJson([], 'Email is required', 0);
                    }
                    Mail::to($request->contactValue)->send(new UserTwoFactorOtpEmail($user));
                    $user->twoFactorEmail = $request->contactValue;
                    $user->save();
                    return $this->toJson([], trans('messages.login.send_otp'), 1);
                }
                if (empty($request->contactValue)) {
                    return $this->toJson([], 'Mobile number is required', 0);
                }
                $user->twoFactorMobileNumber = $request->contactValue;
                CommonHelper::sendOtpMobile($otp, $request->contactValue);
                $user->save();
                return $this->toJson([], trans('messages.login.send_otp_mobile'), 1);
            }

            return $this->toJson([], trans('messages.login.otp_error'), 0);
        } catch (\Exception $th) {
            return $this->toJson([], trans('messages.login.otp_error'), 0);
        }
    }

    public function checkUserPassword(Request $request): JsonResponse
    {
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            if ($user->google2fa_secret || $user->two_factor_email || $user->two_factor_phone) {
                return response()->json([
                    'success' => true,
                    'mfa_auth' => true
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'mfa_auth' => false
                ]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function cancelSubscriptionPlan(Request $request): JsonResponse
    {
        $user = Auth::user();
        $productTransaction = ProductTransactions::where(['id' => $request->id, 'scheduleId' => $user->id])->first();

        if ($productTransaction) {

            StripeHelper::cancelSubscription($productTransaction->subscriptionId);
            Products::where(['id' => $productTransaction->productId])->update(['isPlanCancelled' => 1]);
            $productTransaction->update(['isPlanCancelled' => 1]);

            return $this->toJson([], 'Your plan subscription has been successfully canceled.', 1);
        }
        return $this->toJson([], 'There is some problem! Please try again later.', 0);
    }

    public function verify2FAAuthentication(Request $request): JsonResponse
    {
        if (AuthenticationHelper::validateAuthentication($request->auth_code, Auth::id())) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function purgeVault(): RedirectResponse
    {
        if (Password::where('user_id', Auth::id())->delete()) {
            return redirect()->back()->with('success', 'Purged successfully!');
        }

        return redirect()->back()->with('error', 'Something went wrong!');
    }
}
