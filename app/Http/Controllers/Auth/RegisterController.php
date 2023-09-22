<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string','min:4', 'max:255'],
            'avatar' => ['required','image'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','unique:users','regex:/^0[0-9]{7,11}$/','min:8','max:12',],
            'password' => ['required', 'string', 'min:6','max:35', 'confirmed'],
        ]);
    }
    // public function messages(): array
    // {
    //     return [
    //         // name
    //         "name.required" => "Tên không được để trống",
    //         "name.min" => "Số kí tự phải lớn hơn 4",
    //         "name.max" => "Số kí tự phải nhỏ hơn 20",
    //         "name.string" => "Phải là chữ",
    //         // price
    //         "price.required"=>"Giá dịch vụ không được để trống",
    //         "price.numeric"=>"Giá dịch vụ phải là số",
    //         "price.gte"=>"Giá dịch vụ phải lớn hơn 1000",
    //         // date_number
    //         "date_number.required"=>"Số ngày dịch vụ không được để trống",
    //         "date_number.numeric"=>"Số ngày dịch vụ phải là số",
    //         "date_number.gte"=>"Số ngày dịch vụ phải lớn hơn 1",
    //         // Description
    //         "description.required"=>"Mô tả không được để trống",
    //         "description.min"=>"Số kí tự phải lớn hơn 5",
    //         "description.max"=>"Số kí tự phải nhỏ hơn 999",
    //     ];
    // }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['avatar']){
            $data['avatar']=upload_file(OBJECT_USER,$data['avatar']);
        }
        toastr()->success('Tạo tài khoản thành công!','Thành công');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'avatar' => $data['avatar'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
