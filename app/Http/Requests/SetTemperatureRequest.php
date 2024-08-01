<?php

namespace App\Http\Requests;


class SetTemperatureRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'temperature' => 'required',
            'macId' => 'required|exists:hsms_tools,macId'
        ];
    }
}
