<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'logo' => 'required',
            'email' => 'required|email:rfc,dns',
            'support_phone' => 'required|numeric|digits:10',
            'zalo' => 'required|numeric|digits:10',
            'address' => 'required|max:255'
        ];
    }
}