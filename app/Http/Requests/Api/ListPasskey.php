<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;

class ListPasskey extends ApiRequest
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
        ];
    }
}
