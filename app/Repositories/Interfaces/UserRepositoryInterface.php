<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findAuthUser(): ?User;
    public function findById(int $id): ?User;
    public function findByEmail(string $email): ?User;
    public function findByOtp(string $otp): ?User;
    public function clearOtp(User $user): void;
    public function getOtpValueByUserRole(string $role): ?string;
    public function getRoleByEmail(string $email): ?User;
    public function countUsersByRole(string $role): int;
    public function countActiveUsersByRole(string $role): int;
    public function create(array $data): User;
    public function update(array $data, User $user): bool;
}
