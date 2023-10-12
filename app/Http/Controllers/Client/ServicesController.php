<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\RoomPost;
use App\Models\Services;
use App\Models\User;
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
        $services=Services::all();
        return view('client.services.index',compact('services','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $user_id=Auth::user()->id;
        //lấy số point của người đang đăng nhập
        $user=User::find($user_id);
        //lấy thông tin đăng theo id
        $room_post=RoomPost::find($id);
        //lấy id services của gói dịch vụ muốn mua
        $services_id=$request->input('services_id');
        //lấy thông tin services theo id
        $services=Services::find($services_id);
        dd($services);
        if($user->point>$services->price){
            $user->point=$user->point-$services->price;
            $room_post->id_services=$services_id;
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
