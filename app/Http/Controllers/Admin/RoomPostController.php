<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\District;
use App\Models\FacilityRoom;
use App\Models\RoomPost;
use App\Models\SurroundingRoom;
use App\Models\Ward;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;

class RoomPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_rooms = CategoryRoom::all();
        $wards = Ward::all();
        $districts = District::all();
        $data = RoomPost::query()->latest()->get();
        return view('admin.roompost.index', compact('data','category_rooms','wards','districts'));
        // đã huỷ, đang xử lý, đã xác nhận trạng thái thông báo
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            FacilityRoom::query()->where('room_id', $id)->delete();
            SurroundingRoom::query()->where('room_id', $id)->delete();
            RoomPost::query()->findOrFail($id)->delete();
            Toastr::success('Tin đăng được thêm vào thùng rác thành công', 'Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }
    public function deleted()
    {
        $category_rooms = CategoryRoom::all();
        $wards = Ward::all();
        $districts = District::all();
        $data = RoomPost::onlyTrashed()->get();
        return view('admin.roompost.delete', compact('data', 'category_rooms', 'wards', 'districts'));
    }
    public function restore(String $id)
    {
        try {
            $facility = FacilityRoom::query()->onlyTrashed()->where('room_id', $id);
            $facility->restore();

            $surrounding = SurroundingRoom::query()->onlyTrashed()->where('room_id', $id);
            $surrounding->restore();

            $RoomPost = RoomPost::query()->onlyTrashed()->findOrFail($id);
            $RoomPost->restore();

            Toastr::success('Khôi phục tin đăng thành công', 'Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }
    public function permanentlyDelete(String $id)
    {
        try {
            $coupon = RoomPost::where('id', $id);
            $coupon->forceDelete();
            $facility = FacilityRoom::query()->where('room_id', $id);
            $facility->forceDelete();

            $surrounding = SurroundingRoom::query()->where('room_id', $id);
            $surrounding->forceDelete();
            Toastr::success('Xoá tin đăng thành công', 'Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }
}
