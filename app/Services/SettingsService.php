<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Google2FALaravel\Google2FA;

class SettingsService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAuthenticatorData(): array
    {
        $user = $this->userRepository->findAuthUser();
        $google2fa = app(Google2FA::class);

        $gid = $user->google2fa_secret;

        $registration_data = $user;
        $registration_data["google2fa_secret"] = !empty($user->google2fa_secret) ? $user->google2fa_secret : $google2fa->generateSecretKey(16);

        session()->put('registration_data', $registration_data);

        $QR_Image = $google2fa->getQRCodeInline(
            env('APP_NAME'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );

        $secret = $registration_data['google2fa_secret'];

        return [
            'QR_Image' => $QR_Image,
            'secret' => $secret,
            'gid' => $gid,
            'user' => $user
        ];
    }

    public function updateProfile(Request $request): bool
    {
        $user = $this->userRepository->findAuthUser();

        return $this->userRepository->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone
        ], $user);
    }

    public function changeTwoFactorStatus(): string|array
    {
        $user = $this->userRepository->findAuthUser();

        if (empty($user)) {
            return [
                'success' => false,
                'message' => trans('messages.msg.not_found', ['type' => $user->two_factor_auth ? 'enable' : 'disable']),
                'status' => 0
            ];
        }

        $user->two_factor_auth = !$user->two_factor_auth;

        if ($user->save()) {
            return [
                'success' => true,
                'message' => trans('messages.msg.two_factor.success', ['type' => $user->two_factor_auth ? 'enable' : 'disable']),
                'status' => 1
            ];
        }
        return '';
    }

    public function deleteUserTwoFactorAuth(array $data): bool|array
    {
        $user = $this->userRepository->findAuthUser();

        if ($user) {
            if ($data['contactValue'] == 'app') {
                $user->update(['google2fa_secret' => null]);
            }

            if ($user->two_factor_auth == 1) {
                return [
                    'message' => "You can't delete authentication! First you have to disabled 2 step verification.",
                    'status' => 0
                ];
            }

            if ($data['contactValue'] == 'number') {
                $user->update(['two_factor_phone' => null]);
            }

            if ($data['contactValue'] == 'email') {
                $user->update(['two_factor_email' => null]);
            }

            return [
                'message' => trans('messages.msg.deleted.success', ['module' => 'authentication']),
                'status' => 1
            ];
        }

        return [
            'message' => trans('messages.msg.deleted.error', ['module' => 'authentication']),
            'status' => 0
        ];
    }
}
