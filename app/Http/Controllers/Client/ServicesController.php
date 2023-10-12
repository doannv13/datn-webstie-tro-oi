<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\RoomPost;
use App\Models\Services;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services=Services::all();
        return view('client.services.index',compact('services'));
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
        $services=Services::all();
        return view('client.services.buy-services',compact('services','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // lấy id user đang đăng nhập
        $user_id=Auth::user()->id;
        //lấy số point của người đang đăng nhập
        $user=User::find($user_id);
        //lấy thông tin đăng theo id
        $room_post=RoomPost::find($id);
        // dd($room_post);
        //lấy id services của gói dịch vụ muốn mua
        $services_id=$request->input('services_id');
        //lấy thông tin services theo id
        $services=Services::find($services_id);
        // dd($services);
        if($user->point>=$services->price){
            $user->point=$user->point-$services->price;
            $room_post->service_id=$services_id;
            // dd($services->price,$services_id);
            //update lại số point cho user sau khi mua
            $user->save();
            //update lại thông tin tin đăng sau khi mua
            $room_post->save();
            Toastr::success('Mua gói dịch vụ thành công','Thành công');
            return redirect()->route('room-posts.index');
        }else{
            Toastr::error('Bạn cần nạp point để mua dịch vụ','Thất bại');
            return back();
        }
      

        
        // dd($services_id,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
