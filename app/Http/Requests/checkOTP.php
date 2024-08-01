<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkOTP extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'otp' => 'required'
        ];
    }
}
