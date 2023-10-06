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
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
            'email' => 'required|email:rfc,dns',
            'support_phone' => 'required|numeric|digits:10',
            'address' => 'required|max:255',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif',
            'meta_title' => 'required|max:255',
            'meta_author' => 'required|max:255',
            'meta_description' => 'required|max:255',
            'meta_keyword' => 'required|max:255',
            'analytic' => 'max:255',
        ];
    }
}
