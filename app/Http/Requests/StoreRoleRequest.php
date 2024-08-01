<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roleName' => 'required|string',
            'hsmStorage' => 'required|array',
            'hsmStorage' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    // Check if at least one element in the hsmStorage array has a storage value
                    $hasStorage = collect($value)->pluck('storage')->filter()->isNotEmpty();

                    if (!$hasStorage) {
                        $fail('At least one storage is required in the hsmStorage.');
                    }
                },
            ],

        ];
    }
}
