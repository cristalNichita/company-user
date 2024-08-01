<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorePassKeyUser extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(Request $request): array
    {
        return [
            "name" => "required|max:100",
            "user_id" => "required|exists:users,id",
            "url" => "nullable|url",
            "password"   => "required",
            "account_name" => "required",
            "mfa_required" => "nullable",
            "master_password_required" => "nullable"
        ];
    }
}
