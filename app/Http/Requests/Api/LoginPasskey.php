<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginPasskey extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if (Str::contains($request->email, '@')) {
            $rules = ['email' => 'required|email', "password" => "required"];
        } else {
            $rules = ['email' => 'required', "password" => "required"];
        }

        return $rules;
    }

    public function messages()
    {

        $message = [
            'email.required' => 'Please enter user id/email'
        ];

        return $message;
    }
}
