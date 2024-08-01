<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\WebAuthnHelper;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\User;

class PasskeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $gId = $user->google2fa_secret;

        $auth = AuthenticationHelper::authenticationProcess($user);

        $QR_Image = $auth['QR_Image'] ?? "";
        $secret = $auth['secret'] ?? "";

        $assignRole = [];
        if ($user->role == 'user') {
            $assignRole = UserRole::where('userId', $user->id)->with('getUserRole')->first();
        }

        return view('user.passkey.index', compact('user', 'QR_Image', 'secret', 'gId', 'assignRole'));
    }

    public function authSave(Request $request): RedirectResponse
    {
        $auth = AuthenticationHelper::verifyAuthentication($request);

        if ($auth) {
            return redirect()->back()->with('success', 'Authentication App OTP has been verified successfully.');
        }

        return back()->withErrors(['otp' => 'Invalid OTP!']);
    }

    /**
     * Verify Authentication App Secret Key
     * @return \Illuminate\Http\Response
     */
    public function authVerify(Request $request)
    {
        if (empty($request->authOtp)) {
            return $this->toJson([], "OTP is required.", 0);
        }

        $auth = AuthenticationHelper::validateAuthentication($request->authOtp);

        if ($auth == true) {
            return $this->toJson([], 'Authentication App OTP has been verified successfully.', 1);
        }
        return $this->toJson([], 'Invalid OTP!', 0);
    }


    /**
     * Delete User Passkey for modal.
     *
     * @param  id
     * @return json
     **/
    public function destroy(Request $request, $id)
    {
        $exist = WebAuthnHelper::deleteUserPasskey($id);
        if ($exist) {
            return redirect(route('passkey.index'))->with('success', trans('messages.msg.deleted.success', ['module' => 'passkey']));
        }
        return redirect()->back()->with('error', trans('messages.msg.deleted.error', ['module' => 'passkey']));
    }

    /**
     * Delete User Passkey on delete.
     *
     * @param  id
     * @return json
     */
    public function deletePasskey(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            WebAuthnHelper::deleteUserPasskey($user->id);
            return $this->toJson([], trans('messages.msg.deleted.success', ['module' => 'passkey']), 1);
        }
        return $this->toJson([], trans('messages.msg.deleted.error', ['module' => 'passkey']), 0);
    }

    public function deleteOtp(Request $request): JsonResponse
    {
        $user = Auth::user();
        if ($user) {
            $user->update(['mfaEmail' => null, 'mfaMobileNumber' => null, 'isKeyManagerOTP' => 0]);

            return $this->toJson([], trans('messages.msg.deleted.success', ['module' => 'Mobile/Email OTP']), 1);
        }
        return $this->toJson([], trans('messages.msg.deleted.error', ['module' => 'Mobile/Email OTP']), 0);
    }

    public function deleteAuthentication(): JsonResponse
    {
        $user = Auth::user();
        if ($user) {
            User::where('id', $user->id)->update(['google2fa_secret' => null]);

            return $this->toJson([], trans('messages.msg.deleted.success', ['module' => 'authentication app']), 1);
        }
        return $this->toJson([], trans('messages.msg.deleted.error', ['module' => 'authentication app']), 0);
    }


    /**
     * Display a listing of the Installed Passkey.
     *
     * @return \Illuminate\Http\Response
     */
    public function installPasskey()
    {
        $user = Auth::user();
        return view('user.passkey.install-passkey', compact('user'));
    }


    /**
     * Display a listing of the MFA.
     *
     * @return \Illuminate\Http\Response
     */
    public function mfa()
    {
        return view('user.passkey.mfa');
    }


    /**
     * Face ID Store
     *
     * @return \Illuminate\Http\Response
     **/
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $user = Auth::user();

        // Decode the Data URL and save the image file
        $imageData = $request->input('image');
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageName = time() . '.jpeg';
        Storage::disk('s3')->put('profiles/' . $imageName, base64_decode($imageData));
        $user->faceIdImage = $imageName;
        $user->save();

        // You can also save the image path to the database if needed

        return redirect()->back()->with('success', 'Face ID has been installed successfully.');
    }


    /**
     * Face ID Validate
     *
     * @return \Illuminate\Http\Response
     **/
    public function validateFace(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);
        $flag =  AuthenticationHelper::faceVerify($request);

        if ($flag['status'] == true) {
            return $this->toJson([], $flag['message'], 1);
        }

        return $this->toJson([], $flag['message'], 0);
    }

    /**
     * Delete OTP
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteFaceId(Request $request)
    {
        $user = Auth::user();
        if ($user) {

            // Delete the image from S3
            Storage::disk('s3')->delete('profiles/' . $user->faceIdImage);
            Storage::disk('s3')->delete('validate/' . $user->faceIdImage);

            $user->update(['faceIdImage' => null]);

            return $this->toJson([], trans('messages.msg.deleted.success', ['module' => 'Face ID']), 1);
        }
        return $this->toJson([], trans('messages.msg.deleted.error', ['module' => 'Face ID']), 0);
    }
}
