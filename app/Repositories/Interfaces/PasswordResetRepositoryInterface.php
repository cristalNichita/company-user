<?php

namespace App\Repositories\Interfaces;

use App\Models\PasswordReset;

interface PasswordResetRepositoryInterface
{
    public function tokenExists(string $email, string $token): bool;
    public function deleteByEmail(string $email): void;
    public function create(array $data): ?PasswordReset;
}
