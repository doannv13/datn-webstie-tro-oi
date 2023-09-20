<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:5|',
            'email' => 'required|min:5|unique:users,email,' . $this->id,
            'password' => 'required|min:6|max:100',
            'phone' => 'required|regex:/^[0-9]{9,}$/|max:12|min:9|unique:users,phone,' . $this->id,
            'avatar' => 'image',
        ];
    }
}
