<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\CategoryRoom;
use App\Models\District;

use App\Models\ImageRoom;

use App\Models\Post;
use App\Models\RoomPost;
use App\Models\Ward;
use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->where('status', 'active')
            ->latest('id')
            ->limit(36)
            ->paginate(6);
        $posts = Post::with('user')->where('status', 'active')->latest('id')->limit(6)->get();
        // dd($posts);
        // dd($rooms);
        //đếm số tin đăng ,user ,bài viết
        $count_room=count(RoomPost::all());
        $count_user=count(User::all());
        $count_post=count(Post::all());
        // dd($count_room,$count_user,$count_post);

        return view('client.layouts.home', compact('category_rooms', 'wards', 'districts', 'rooms', 'posts','count_room','count_user','count_post'));
        // $rooms = RoomPost::all();
        // dd($rooms);
        return view('client.layouts.home', compact('category_rooms', 'wards', 'districts', 'rooms'));
    }
    public function bookmark(Request $request, string $id)
    {
        if (Auth::check()) {
            $user_id = auth()->user()->id;
            $existingBookmark = Bookmark::where('user_id', $user_id)
                ->where('room_post_id', $id)
                ->first();

            if (!$existingBookmark) {
                $model = new Bookmark();
                $model->user_id = $user_id;
                $model->room_post_id = $id;
                $model->save();
                toastr()->success('Bạn vừa lưu 1 phòng', 'Đã lưu');
                return to_route('home');
            } else {
                toastr()->error('Phòng đã được lưu trước đó', 'Thất bại');
                return back();
            }
        } else {
            toastr()->error('Bạn cần phải đăng nhập', 'Thất bại');
            return redirect('/client-login');
        }
    }
    public function listbookmark()
    {
        if (Auth::check()) {
            $user_id = auth()->user()->id;
            $room_posts = RoomPost::latest()->with('facilities')->paginate(10);
            $data = Bookmark::where('user_id', $user_id)->with('roomPost')->paginate(6);
            $categories = CategoryRoom::withCount('roomPosts')
                ->having('room_posts_count', '>', 0)
                ->paginate(4);
            $posts = Post::latest()->paginate(5);
            // dd($room_posts[0]->facilities);
            return view('client.bookmark', compact('data', 'categories', 'posts', 'room_posts'));
        } else {
            toastr()->error('Bạn cần phải đăng nhập', 'Thất bại');
            return redirect('/client-login');
        }
    }
    public function unbookmark(string $id)
    {
        try {
            $user_id = auth()->user()->id;
            $model = Bookmark::where('user_id', $user_id)
                ->where('room_post_id', $id)
                ->firstOrFail();
            $model->delete();
            toastr()->success('Đã bỏ lưu 1 phòng', 'Thành công');
            return back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
    }
    public function unbookmarkbm(string $id)
    {
        try {
            $model = Bookmark::findOrFail($id);
            $model->delete();
            toastr()->success('Đã bỏ lưu 1 phòng', 'Thành công');
            return back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Có lỗi xảy ra', 'Thử lại sau');
            return back();
        }
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

        $list_ward_id = Ward::where('district_id', $districts)->pluck('id');
        $query = RoomPost::query();
        $query->where('name', 'like', '%' . $search . '%');

        if ($selectedRoomType !== 'all') {
            $query->where('category_room_id', $selectedRoomType);
        }
        if ($districts !== 'all') {
            $query->whereIn('id_wards', $list_ward_id);
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

    function roomPostDetail(String $id)
    {
        $room_postss = RoomPost::latest()->with('facilities')->paginate(10);
        $categories = CategoryRoom::withCount('roomPosts')
            ->having('room_posts_count', '>', 0)
            ->paginate(4);
        $posts = Post::latest()->paginate(5);
        $roomposts = RoomPost::query()->with('facilities', 'surrounds')->findOrFail($id);
        $caterooms = RoomPost::query()->with('facilities', 'surrounds')
            ->where('id', '!=', $id)
            ->where('category_room_id', $roomposts->category_room_id)
            ->get();
        $images = ImageRoom::query()->where('room_id', $id)->get();
        return view('client.room-post.detail', compact('roomposts', 'images', 'caterooms', 'room_postss', 'categories', 'posts'));
    }
}
