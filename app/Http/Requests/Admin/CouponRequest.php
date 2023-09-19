<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            'name' => 'required|min:5|unique:coupons,name,' . $this->id,
            'type' => 'required',
            'value' => 'required',
            'quantity' => 'required|integer',
            'description' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => [
                'required',
                'after:start_date',
                // Rule::afterOrEqual($this->input('start_date')), 
            ],
        ];
    }
}
