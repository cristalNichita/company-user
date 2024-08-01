<?php

namespace App\Repositories;

use App\Models\PasswordReset;
use App\Repositories\Interfaces\PasswordResetRepositoryInterface;

class PasswordResetRepository implements PasswordResetRepositoryInterface
{
    public function tokenExists(string $email, string $token): bool
    {
        return PasswordReset::where(['email' => $email, 'token' => $token])->exists();
    }
    public function deleteByEmail(string $email): void
    {
        PasswordReset::where('email', $email)->delete();
    }
    public function create(array $data): ?PasswordReset
    {
        return PasswordReset::create($data);
    }
}
