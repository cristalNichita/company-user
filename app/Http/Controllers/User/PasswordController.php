<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StorePassKeyUser;
use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;
use App\Models\Password;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\PlatformAccount;
use App\Helpers\HsmCloudHelper;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\UserHsm;
use Exception;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $passwords = Password::where('user_id', $user->id)->with('user')->get();

        $gId = $user->google2fa_secret;

        $auth = AuthenticationHelper::authenticationProcess($user);

        $secret = $auth['secret'] ?? "";

        $customRole = [];
        if ($user->role == 'user') {
            $customRole = UserRole::where('userId', $user->id)->with('getUserRole')->first();
            $customRole = $customRole ? $customRole->getUserRole['authentication'] : [];
        }
        return view('user.password.index', compact('passwords', 'user', 'secret', 'gId', 'customRole'));
    }

    public function store(StorePassKeyUser $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            if ($request->mfa_required) {
                $validated['mfa_required'] = $validated['mfa_required'] == 'on' ? 1 : 0;
            }
            if ($request->master_password_required) {
                $validated['master_password_required'] = $validated['master_password_required'] == 'on' ? 1 : 0;
            }
            $store = Password::create($validated);

            if($store){
                $store->update([
                    'favicon_url' => "https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=" . $validated['url'] . "&size=50"
                ]);

                return redirect()->back()->with('success', trans('messages.passkey.store'));
            }
            return redirect()->back()->with('error', trans('messages.passkey.store_or_update_error'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function getOnePassword(Request $request): JsonResponse
    {
        $password = Password::find($request->id);

        return response()->json([
            'payload' => $password
        ]);
    }

    /**
     * This function use for check password
     *
     * @param  mixed $request
     * @return void
    **/
    function checkPasswordStrength(Request $request)
    {
       $val = CommonHelper::checkPasswordStrength($request->value);
       return $val;
    }

    public function deletePassKey(Request $request): RedirectResponse
    {
        $delete = Password::destroy($request->id);
        if ($delete) {
            return redirect()->back()->with('success', trans('messages.msg.deleted.success', ['module' => 'password']));
        }
        return redirect()->back()->with('error', trans('messages.msg.deleted.error', ['module' => 'password']));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $update = Password::where('id', $id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'password' => $request->password,
            'favicon_url' => "https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=" . $request->url . "&size=50",
            'account_name' => $request->account_name,
            'mfa_required' => $request->mfa_required == 'on' ? 1 : 0,
            'master_password_required' => $request->master_password_required == 'on' ? 1 : 0
        ]);

        if ($update) {
            return redirect()->back()->with('success', trans('messages.msg.updated.success', ['module' => 'password']));
        }

        return redirect()->back()->with('error', trans('messages.msg.updated.error', ['module' => 'password']));
    }

    public function searchPasswords(Request $request): string
    {
        if (strlen($request->input('query')) > 0) {
            $results = Password::where('name', 'like', '%' . $request->input('query') . '%')->get();
        } else {
            $results = [];
        }

        return view('user.password.password-search', ['results' => $results])->render();
    }

    /**
     * This function use Activity log request using ajax
     *
     * @param  mixed $request
     * @return void
     */
    public function ajaxActivityRequest(Request $request)
    {
        $user = Auth::user();
        $accessMode = null;
        if ($request->type == "Detail") {
            $description = 'User '.$user->email.' open view detail';
        }

        if ($request->type == 'View Password') {
            $description = 'User '.$user->email.' view password';
            if (is_string($request->details)) {
                $accessMode = $request->details;
            }
        }

        if ($request->type == 'Delete Password') {
            $description = 'User '.$user->email.' deleted account';
            if (is_string($request->details)) {
                $accessMode = $request->details;
            }
        }

        if ($request->type == 'Copy Password') {
            $description = 'User '.$user->email.' copy password';
            if (is_string($request->details)) {
                $accessMode = $request->details;
            }
        }
        if ($request->type == 'Form Submit') {
            $description = 'User '.$user->email.' upload password';
        }

        if ($request->type == 'Face Auth') {
            $description = 'User '.$user->email.' upload password';
            $accessMode = $request->type;
        }

        if ($request->type == 'Mobile/Email OTP') {
            $description = 'User '.$user->email.' upload password';
            $accessMode = $request->type;
        }

        if ($request->type == 'Authentication App') {
            $description = 'User '.$user->email.' upload password';
            $accessMode = $request->type;
        }

        if ($request->type == 'Passkey') {
            $description = 'User '.$user->email.' upload password';
            $accessMode = $request->type;
        }


        $url = null;
        $password = null;

        // ADD Activity LOG
        CommonHelper::auditLog($url, '1', $accessMode, $password, $browser=null);
    }

    public function getPasswordCloudAjax(Request $request): JsonResponse
    {
            $password = Password::find($request->id);

            if ($password->user_id == Auth::id()) {
                return response()->json(['password' => $password->password, 'status' => true]);
            }

            return response()->json(['error' => 'No password found!', 'status' => false]);
    }

}
