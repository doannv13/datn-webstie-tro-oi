<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\RoomPost;
use App\Models\Services;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Transaction;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Services::paginate(3);
        return view('client.services.index', compact('services'));
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
        $services = Services::paginate(3);
        return view('client.services.buy-services', compact('services', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // lấy id user đang đăng nhập
        $user_id = Auth::user()->id;
        //lấy số point của người đang đăng nhập
        $user = User::find($user_id);
        //lấy thông tin đăng theo id
        $room_post = RoomPost::find($id);
        // dd($room_post);
        //lấy id services của gói dịch vụ muốn mua
        $services_id = $request->input('services_id');
        //lấy thông tin services theo id
        $service = Services::find($services_id);
        $transcation = new Transaction();
        // dd($services);
        if ($room_post->service_id== null || $room_post->service_id > $service->id || Carbon::now()>Carbon::parse($room_post->time_end)) {
            if ($user->point >= $service->price) {

                $user->point = $user->point - $service->price;
                $room_post->service_id = $services_id;
                $room_post->time_end = Carbon::now()->addDays($service->date_number);
                $room_post->created_at=Carbon::now();
                // dd($services->price,$services_id);
                //đẩy lịch sử giao dịch vào bảng transaction
                $transcation->user_id=$user_id;
                $transcation->point=$service->price;
                $transcation->action='export';
                $transcation->status='accept';
                $transcation->room_post_id=$id;
                //update lại số point cho user sau khi mua
                $user->save();
                //update lại thông tin tin đăng sau khi mua
                $room_post->save();
                $transcation->save();
                Toastr::success('Mua gói dịch vụ thành công', 'Thành công');
                return redirect()->route('room-posts.index');
            } else {
                $modal=true;
                Toastr::error('Bạn cần nạp point để mua dịch vụ', 'Thất bại');
                // dd($modal);
                return back()->with($modal);
                
            }
        } else {
            Toastr::error('Bạn chỉ được mua gói dịch vụ cao cấp hơn !', 'Thất bại');
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
