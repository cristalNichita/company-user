<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddMember extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            "email"    => ['required', Rule::unique('users', 'email')->ignore($request->email)->whereNull('deletedAt')],
            'employeeId' => 'required|min:3|max:10'
        ];
    }
}
