<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddThemeColor extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'themeColor' => 'required',
            'fontColor' => 'required',
        ];
    }
}
