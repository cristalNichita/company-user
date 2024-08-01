<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "fullname" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "confirm_password" => "required|min:8|same:password",
        ];
    }
}