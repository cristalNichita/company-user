<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;

class BrowserRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            "systemName"   => "required",
            "systemType"   => "required",
        ];
    }
}
