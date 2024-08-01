<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function findAuthUser(): ?User
    {
        return User::find(Auth::id());
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return User::whereEmail($email)->first();
    }

    public function findByOtp(string $otp): ?User
    {
        return User::where('key_manager_otp', $otp)->first();
    }

    public function clearOtp(User $user): void
    {
        $user->key_manager_otp = null;
        $user->save();
    }

    public function getOtpValueByUserRole(string $role): ?string
    {
        return User::where('role', $role)->value('key_manager_otp');
    }

    public function getRoleByEmail(string $email): ?User
    {
        return User::where('email', $email)->value('role');
    }

    public function countUsersByRole(string $role): int
    {
        return User::where('role', $role)->count() ?? 0;
    }

    public function countActiveUsersByRole(string $role): int
    {
        return User::where(['role' => $role, 'active' => 1])->count() ?? 0;
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data, User $user): bool
    {
        return User::where('id', Auth::id())->update($data);
    }
}
