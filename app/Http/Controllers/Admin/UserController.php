<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::query()->latest()->get();
        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $model = new User();
            $model->fill($request->all());
            $notification = array(
                "message" => "Thêm mới người dùng thành công",
                "alert-type" => "success",
            );
            if ($request->hasFile('avatar')) {
                $model->avatar=upload_file(OBJECT_USER,$request->file('avatar'));
            }
            $model->save();
            toastr()->success('Thêm tài khoản thành công!');
            return to_route('users.index')->with('status', Response::HTTP_OK);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm tài khoản thất bại!');
            return back()->with('status', Response::HTTP_BAD_REQUEST);
        }
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
        $data= User::findOrFail($id);
        return view('admin.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        //
        try {
            $model = User::findOrFail($id);
            $model->fill($request->all());
            if($request->has('new_avatar') ){
                $model->avatar=upload_file(OBJECT_USER,$request->file('new_avatar'));
            }else{
                $model->avatar=$request->old_avatar;
            }
            $model->save();
            if($request->hasFile('new_avatar')){
                delete_file($request->old_avatar);
            }
            toastr()->success('Sửa thông tin tài khoản thành công!');
            return to_route('users.index')->with('status', Response::HTTP_OK);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin tài khoản thất bại!');
            return back()->with('status', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            toastr()->success('Chuyển tài khoản vào kho lưu trữ thành công!');
            return redirect()->back()->with('status', Response::HTTP_OK);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa tài khoản thất bại!');
            return back()->with('status', Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleted(){
        try {
        $data = User::onlyTrashed()->get();
        return view('admin.users.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = User::where('id', $id);
            $data->forceDelete();
            if ($data->image) {
                delete_file($data->image);
        }
            toastr()->success('Xóa tài khoản thành công!');
            return redirect()->back()->with('status', Response::HTTP_OK);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa tài khoản thất bại!');
            return back()->with('status', Response::HTTP_BAD_REQUEST);
        }
    }

    public function restore($id){
        try {
        $data = User::onlyTrashed()->find($id);
        $data->restore();
        toastr()->success('Khôi phục tài khoản thành công!');
        return redirect()->back()->with('status', Response::HTTP_OK);;
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Cập nhật cài đặt thất bại!');
            return back()->with('status', Response::HTTP_BAD_REQUEST);
        }
    }
}
