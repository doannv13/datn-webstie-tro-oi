<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class RoomPostRequest extends FormRequest
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
            'name' => 'required|unique:room_posts,name,' . $this->id,
            'price' => 'required',
            'address' => 'required',
            'address_full' => 'required',
            'acreage' => 'required',
            'empty_room' => 'required',
            'description' => 'required',
            'managing' => 'required',
            'ward_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'facility' => 'required',
            'surrounding' => 'required',
            'category_room_id' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'zalo' => 'required'
        ];
    }
}
