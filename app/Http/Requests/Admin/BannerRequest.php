<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:50',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'url' => 'required|url',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Trường tiêu đề là bắt buộc.',
            'title.max' => 'Trường tiêu đề không được dài quá :max ký tự.',
            'image.mimes' => 'Hình ảnh phải có định dạng là jpeg, png, jpg hoặc gif.',
            'url.required' => 'Trường URL là bắt buộc.',
            'url.url' => 'Trường URL phải là một địa chỉ URL hợp lệ.',
            'description.required' => 'Trường mô tả là bắt buộc.',
            'description.max' => 'Trường mô tả không được dài quá :max ký tự.',
        ];
    }
}
