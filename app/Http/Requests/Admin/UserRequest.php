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
            'roles' => 'required|exists:roles,id',
        ];
    }
    public function messages(): array
{
    return [
        'name.required' => 'Vui lòng nhập tên.',
        'name.min' => 'Tên phải có ít nhất 5 ký tự.',

        'email.required' => 'Vui lòng nhập địa chỉ email.',
        'email.min' => 'Địa chỉ email phải có ít nhất 5 ký tự.',
        'email.unique' => 'Địa chỉ email này đã được sử dụng.',

        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        'password.max' => 'Mật khẩu không được quá 100 ký tự.',

        'phone.required' => 'Vui lòng nhập số điện thoại.',
        'phone.regex' => 'Số điện thoại không hợp lệ.',
        'phone.max' => 'Số điện thoại không được quá 12 ký tự.',
        'phone.min' => 'Số điện thoại phải có ít nhất 9 ký tự.',
        'phone.unique' => 'Số điện thoại này đã được sử dụng.',

        'avatar.image' => 'Tập tin avatar phải là hình ảnh.',
    ];
}
}
