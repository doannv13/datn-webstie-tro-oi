<?php

namespace App\Http\Controllers\Auth;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangeInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChangeInfoController extends Controller
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
        $data = User::findOrFail($id);
        return view('client.auth.changeinfo',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChangeInfoRequest $request, string $id)
    {
        try{
            $model = User::findOrFail($id);
            $model->fill($request->all());
            if($request->has('new_avatar') ){
                $model->avatar=upload_file(OBJECT_USER,$request->file('new_avatar'));
            }else{
                $model->avatar=$request->old_avatar;
            }
            $model->save();
            // event( new NotificationEvent());

            toastr()->success('Cập nhập thông tin tài khoản thành công!','Thành công');
            if($request->hasFile('new_avatar')){
                delete_file($request->old_avatar);
            }
            return to_route('home');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Cập nhật thông tin thất bại!','Thất Bại');
            return back();
        }
    }
    public function adminEdit(string $id)
    {
        //
        $data = User::findOrFail($id);
        return view('admin.auth.changeinfo',compact('data'));

    }
    public function adminUpdate(ChangeInfoRequest $request, string $id)
    {
        try{
            $model = User::findOrFail($id);
            $model->fill($request->all());
            if($request->has('new_avatar') ){
                $model->avatar=upload_file(OBJECT_USER,$request->file('new_avatar'));
            }else{
                $model->avatar=$request->old_avatar;
            }
            $model->save();
            toastr()->success('Cập nhập thông tin tài khoản thành công!','Thành công');
            if($request->hasFile('new_avatar')){
                delete_file($request->old_avatar);
            }
            return to_route('home-admin');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Cập nhật thông tin thất bại!','Thất Bại');
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
