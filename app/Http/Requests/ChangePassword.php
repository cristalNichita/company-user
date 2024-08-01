<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "new_password" => "required|min:12",
            "confirm_password" => "required|same:new_password",
            "password_hint" => "nullable",
        ];
    }
}
