<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\District;
use App\Models\Post;
use App\Models\RoomPost;
use App\Models\Ward;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category_rooms = CategoryRoom::all();
        $wards = Ward::all();
        $districts = District::all();
        $rooms = RoomPost::with(['facilities' => function ($query) {
            $query->inRandomOrder()->take(6);
        }])
            ->where('status', 'inactive')
            ->latest('id')
            ->paginate(6);
        $posts = Post::with('admin')->where('status', 'inactive')->latest('id')->limit(6)->get();
        // dd($posts);
        // dd($rooms);
        return view('client.layouts.home', compact('category_rooms', 'wards', 'districts', 'rooms', 'posts'));
    }

    public function fillter_list(Request $request)
    {
        $category_rooms = CategoryRoom::query()->latest()->get();
        $wards = Ward::query()->latest()->get();
        $districts = District::query()->latest()->get();

        $selectedPrice = request()->input('price_filter');
        $selectedAreage = request()->input('areage_filter');
        $selectedRoomType = request()->input('room_type_filter');
        $selectedDistrict = request()->input('district_filter');
        $search = request()->input('name_filter');

        // $list_ward_id = Ward::where('district_id', $district)->pluck('id');
        $query = RoomPost::query();
        $query->where('name', 'like', '%' . $search . '%');

        if ($selectedRoomType !== 'all') {
            $query->where('category_room_id', $selectedRoomType);
        }
        if ($selectedDistrict !== 'all') {
            $query->where('district_id', $selectedDistrict);
        }
        // if ($district !== 'all'){
        //     $query->whereIn('ward_id', $list_ward_id);
        // }
        // Lọc theo giá
        if ($selectedPrice === 'all') {
            // Không cần thêm điều kiện nếu chọn tất cả
        } elseif ($selectedPrice === 'range_price1') {
            $query->whereBetween('price', [0, 1000000]);
        } elseif ($selectedPrice === 'range_price2') {
            $query->whereBetween('price', [1000000, 2500000]);
        } elseif ($selectedPrice === 'range_price3') {
            $query->whereBetween('price', [2500000, 4000000]);
        } elseif ($selectedPrice === 'range_price4') {
            $query->where('price', '>=', 4000000);
        }
        // Lọc theo diện tích
        if ($selectedAreage === 'allAreage') {
            // Không cần thêm điều kiện nếu chọn tất cả
        } elseif ($selectedAreage === 'range_areage1') {
            $query->whereBetween('areage', [0, 20]);
        } elseif ($selectedAreage === 'range_areage2') {
            $query->whereBetween('areage', [20, 30]);
        } elseif ($selectedAreage === 'range_areage3') {
            $query->whereBetween('areage', [30, 45]);
        } elseif ($selectedAreage === 'range_areage4') {
            $query->where('areage', '>=', 45);
        }
        $room = $query->get();
        return view('client.layouts.search', compact('category_rooms', 'wards', 'districts', 'room'));
    }
}
