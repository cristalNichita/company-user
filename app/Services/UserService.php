<?php

namespace App\Services;

use App\Helpers\CommonHelper;
use App\Models\User;
use App\Notifications\SendVerificationMail;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register (array $data): bool
    {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->create($data);
            $this->userRepository->update([
                'verification_token' => Str::random(50),
                'role' => 'user',
            ], $user);

            Notification::send($user, new SendVerificationMail(''));

            DB::commit();

            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            return false;
        }
    }

    public function login(array $data): ?User
    {
        if (Auth::attempt($data)) {
            return $this->userRepository->findAuthUser();
        }

        return null;
    }

    public function handlePostLogin(User $user): array
    {
        $accessDetail = CommonHelper::getUserAccessDetails();
        $browser = CommonHelper::getClientBrowserName();

        if (($user->role == 'user') && ($accessDetail['browser']) && !in_array($browser, json_decode($accessDetail['browser']))) {
            Auth::logout();
            return ['redirect' => redirect()->back()->with('error', trans('messages.member.browser_denied'))];
        }

        if ($user->verified == 0) {
            Auth::logout();
            return ['redirect' => redirect('login')->with('not_verified', trans('messages.login.is_verify'))];
        }

        if ($user->active == 0) {
            Auth::logout();
            return ['redirect' => redirect()->back()->with('error', trans('messages.login.is_active'))];
        }

        $allowedRoles = ['admin', 'subadmin'];

        if (in_array($user->role, $allowedRoles)) {
            Auth::logout();
            return ['redirect' => redirect()->back()->with('error', trans('messages.login.error'))];
        }

        $this->userRepository->update([
            'last_login' => Carbon::now(),
        ], $user);

        return ['redirect' => redirect()->route('dashboardPage')->with('success', trans('messages.login.success'))];
    }
}
