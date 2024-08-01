<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;

class UpdatePasskey extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            "platform"   => "required|max:100",
            "accountId"  => "required|max:100",
            "title"      => "required|max:100",
            "password"   => "required"
        ];
    }
}
