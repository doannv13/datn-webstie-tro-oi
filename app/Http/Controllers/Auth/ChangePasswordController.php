<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('client.auth.changepassword');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChangePasswordRequest $request,string $id)
    {
        try{
            $user = Auth::user(); // Lấy người dùng hiện tại

            // Kiểm tra mật khẩu cũ
            if (!Hash::check($request->old_password, $user->password)) {
                toastr()->error('Mật khẩu cũ không đúng!','Thất bại');
                return redirect()->back();
            }
            // Cập nhật mật khẩu mới
            $user->password = bcrypt($request->password);
            $user->save();
            toastr()->success('Cập nhập mật khẩu thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Cập nhật mật khẩu thất bại!','Thất Bại');
            return back();
        }
    }
    public function admineditpw(string $id)
    {
        //
        return view('admin.auth.changepassword');
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminupdatepw(ChangePasswordRequest $request,string $id)
    {
        try{
            $user = Auth::user(); // Lấy người dùng hiện tại

            // Kiểm tra mật khẩu cũ
            if (!Hash::check($request->old_password, $user->password)) {
                toastr()->error('Mật khẩu cũ không đúng!','Thất bại');
                return redirect()->back();
            }
            // Cập nhật mật khẩu mới
            $user->password = bcrypt($request->password);
            $user->save();
            toastr()->success('Cập nhập mật khẩu thành công!','Thành công');
            return to_route('home-admin');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Cập nhật mật khẩu thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
