<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationDetailsMember;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendVerificationMail;
use App\Notifications\ForgotPasswordMail;
use App\Helpers\AuthenticationHelper;
use App\Http\Requests\ForgotPassword;
use App\Http\Requests\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserTwoFactorOtpEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Helpers\CommonHelper;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class AuthController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if ($this->userService->register($validated))
        {
            return redirect('login')->with('success', trans('messages.register.success'));
        } else {
            return redirect('register')->with('error', trans('messages.register.error'));
        }
    }

    public function resendVerificationLink(Request $request): RedirectResponse
    {
        $save = User::whereEmail($request->email)->first();
        if ($save) {
            $save->verificationToken = Str::random(50);
            $save->save();
            Notification::send($save, new SendVerificationMail(''));
            return redirect('login')->with('success', trans('messages.resend_link.success'));
        }
        return redirect('login')->with('error', trans('messages.resend_link.error'));
    }

    public function verifyEmail($url): RedirectResponse
    {
        $info = json_decode(base64_decode($url));

        $verify = User::where(['email' => $info->email, 'verification_token' => $info->token])->first();
        if ($verify) {
            if ($verify->verified) {
                return redirect('login')->with('error', trans('messages.register.token.already'));
            }
            $verify->verified = 1;
            $verify->active = 1;
            $verify->save();

            User::where('id', $verify->id)->update(['isSubscribe' => 1, 'remainingStorage' => '1073741824']);

            return redirect('login')->with('success', trans('messages.register.token.success'));
        }
        return redirect('register')->with('error', trans('messages.register.token.error'));
    }


    public function login(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = $this->userService->login($validated);

        if ($user) {
            $result = $this->userService->handlePostLogin($user);

            return $result['redirect'];
        }

        return redirect()->back()->with('error', trans('messages.login.error'));
    }

    public function userOtpPage($otp, $email, $number): RedirectResponse|View
    {
        $otp = substr(decrypt($otp), -6);

        $userOtp = User::where('keyManagerOTP', $otp)->value('keyManagerOTP');

        if ($userOtp) {
            return view('auth.check-user-otp', compact('otp', 'email', 'number'));
        }

        return redirect()->route('postLogin')->with('error', trans('messages.login.page_expire'));
    }

    public function checkUserOtp(Request $request): RedirectResponse
    {
        $otp = implode('', $request->otp);

        if ($request->contactMethod == 'authOtp') {
            $auth = AuthenticationHelper::validateAuthentication($otp, $request->userId);

            if ($auth == true) {
                Auth::loginUsingId($request->userId);
                return redirect()->route('dashboardPage')->with('success', trans('messages.login.success'));
            }
            return redirect()->back()->with('error', trans('messages.login.otp.error'));
        }


        $user = User::where('keyManagerOTP', $otp)->first();

        if ($user) {
            $user->keyManagerOTP = null;
            $user->save();

            Auth::loginUsingId($user->id);

            return redirect()->route('dashboardPage')->with('success', trans('messages.login.success'));
        }

        return redirect()->back()->with('error', trans('messages.login.otp.error'));
    }

    public function selectedUserTwoFactorOtp(Request $request): JsonResponse
    {
        if ($request->ajax()) {

            if (empty($request->otp)) {
                $otp  = rand(100000, 999999);

                Auth::user()->update(['keyManagerOTP' => $otp]);

                $request->otp = $otp;
            }

            if ($request->contactValue == "twoFactorEmail") {
                $user = User::where(['keyManagerOTP' => $request->otp])
                    ->where(function ($query) use ($request) {
                        $query->where('twoFactorEmail', $request->email)
                            ->orwhere('email', $request->email);
                    })->first();
                Mail::to($request->email)->send(new UserTwoFactorOtpEmail($user));
                return $this->toJson([], trans('messages.login.send_otp'), 1);
            }

            CommonHelper::sendOtpMobile($request->otp, $request->number);
            return $this->toJson([], trans('messages.login.send_otp_mobile'), 1);
        }
        return $this->toJson([], trans('messages.login.otp_error'), 0);
    }

    public function selectedUserMfaOtp(Request $request): JsonResponse
    {
        try {
            if ($request->ajax()) {

                if (empty($request->otp)) {
                    $otp  = rand(100000, 999999);

                    Auth::user()->update(['keyManagerOTP' => $otp]);

                    $request->otp = $otp;
                }

                if ($request->contactValue == "mfaEmail") {
                    $user = User::where(['keyManagerOTP' => $request->otp])
                        ->where(function ($query) use ($request) {
                            $query->where('mfaEmail', $request->email)
                                ->orwhere('email', $request->email);
                        })->first();
                    Mail::to($request->email)->send(new UserTwoFactorOtpEmail($user));
                    return $this->toJson([], trans('messages.login.send_otp'), 1);
                }

                CommonHelper::sendOtpMobile($request->otp, $request->number);
                return $this->toJson([], trans('messages.login.send_otp_mobile'), 1);
            }
            return $this->toJson([], trans('messages.login.otp_error'), 0);
        } catch (\Exception $e) {
            return $this->toJson([], trans('messages.login.otp_error'), 0);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        $user = Auth::user();

        User::where('id', $user->id)->update(['last_logout' => Carbon::now()]);
        Auth::logout();
        return redirect()->route('login')->with('success', trans('messages.logout.success'));
    }

    public function forgotPassword(ForgotPassword $request): RedirectResponse
    {
        try {
            $isUser = User::where('email', $request->email)->first();
            if ($isUser->role == 'user' || $isUser->role == 'business') {
                if (($isUser->role == "business") && ($isUser->primaryHsmId == null)) {
                    return redirect()->back()->with('error', trans('messages.login.hsm_not_assign'));
                }

                $save = PasswordReset::create(['email' => $request->email, 'token' => Str::random(50)]);
                if ($save) {
                    Notification::send($save, new ForgotPasswordMail());
                    return redirect()->back()->with('success', trans('messages.forgot_password.email_send'));
                }
            }
            return redirect()->back()->with('error', trans('messages.forgot_password.email_error'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('messages.forgot_password.email_error'));
        }
    }

    public function resetPasswordForm($url): RedirectResponse|View
    {
        $info = json_decode(base64_decode($url));
        if (PasswordReset::where('email', $info->email)->exists()) {
            return view('auth.reset-password', ['info' => $info]);
        }
        return redirect('login')->with('error', trans('messages.forgot_password.used_link'));
    }

    public function resetPassword(ResetPassword $request): RedirectResponse
    {
        $resetStatus = PasswordReset::where(['email' => $request->email, 'token' => $request->token])->exists();
        if ($resetStatus) {
            $user = User::whereEmail($request->email)->first();
            if ($user) {
                $user->password = $request->password;
                if ($user->save()) {
                    PasswordReset::where(['email' => $request->email])->delete();
                    return redirect('login')->with('success', trans('messages.forgot_password.success'));
                }
            }
            return redirect('login')->with('error', trans('messages.forgot_password.token_error'));
        }
        return redirect('login')->with('error', trans('messages.forgot_password.token_error'));
    }

    public function addRegistrationMemberDetail(RegistrationDetailsMember $request, $type): RedirectResponse
    {
        $result = User::where('id', $request->id)->first();

        if ($result->employeeId != $request->employeeId) {
            return redirect()->back()->with('error', "Employee Id doesn't match!");
        }

        if ($result) {
            $result->update(['userName' => $request->fullname ?? "", 'password' => $request->password, 'verified' => 1, "active" => 1]);

            if ($type == 'admin') {
                return redirect('flashx-admin/')->with('success', trans('messages.member.success', ['module' => 'employee']));
            }
            return redirect('login')->with('success', trans('messages.member.success', ['module' => 'user']));
        }
        return redirect()->back()->with('error', trans('messages.member.error'));
    }
}
