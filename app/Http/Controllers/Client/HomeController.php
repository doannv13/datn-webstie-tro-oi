<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CategoryPost;
use App\Models\CategoryRoom;
use App\Models\District;

use App\Models\ImageRoom;

use App\Models\Post;
use App\Models\RoomPost;
use App\Models\Ward;
use App\Models\Bookmark;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;


class HomeController extends Controller
{
    public function index()
    {
        $category_rooms = CategoryRoom::all();
        $wards = Ward::all();
        // $districts = District::distinct()->pluck('name');
        $districts = District::all();
        $rooms = RoomPost::with(['facilities' => function ($query) {
            $query->inRandomOrder()->take(6);
        }])
            ->where('status', 'active')
            ->latest('id')
            ->limit(36)
            ->paginate(6);
        $posts = Post::with('user')->where('status', 'active')->latest('id')->limit(6)->get();
        $banners = Banner::query()->where('status', 'active')->latest()->limit(3)->get();
        // dd($posts);
        // dd($rooms);
        //đếm số tin đăng ,user ,bài viết
        $count_room = count(RoomPost::all());
        $count_user = count(User::all());
        $count_post = count(Post::all());
        // dd($count_room,$count_user,$count_post);
        // dd($districts);


        return view('client.layouts.home', compact('category_rooms', 'wards', 'districts', 'rooms', 'posts', 'count_room', 'count_user', 'count_post', 'banners'));
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
                return back();
            } else {
                toastr()->error('Phòng đã được lưu trước đó', 'Thất bại');
                return back();
            }
        } else {
            toastr()->error('Bạn cần phải đăng nhập', 'Thất bại');
            return redirect('/client-login');
        }
    }
    public function listBookmark()
    {
        if (Auth::check()) {
            $user_id = auth()->user()->id;
            $room_posts = RoomPost::latest()->with('facilities')->paginate(10);
            $data = Bookmark::where('user_id', $user_id)->with('roomPost')->paginate(6);
            $categories = CategoryRoom::withCount('roomPosts')
                ->having('room_posts_count', '>', 0)
                ->paginate(4);
            $posts = Post::latest()->paginate(5);
            return view('client.bookmark', compact('data', 'categories', 'posts', 'room_posts'));
        } else {
            toastr()->error('Bạn cần phải đăng nhập', 'Thất bại');
            return redirect('/client-login');
        }
    }
    public function unBookmark(string $id)
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
    public function unBookmarkbm(string $id)
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
        $districts = District::distinct()->pluck('name');

        $selectedPrice = request()->input('price_filter');
        $selectedAcreage = request()->input('acreage_filter');
        $selectedRoomType = request()->input('room_type_filter');
        $selectedDistrict = request()->input('district_filter');
        $search = request()->input('name_filter');

        $tags = RoomPost::with('tags')
            ->get()
            ->pluck('tags.*.name')
            ->flatten()
            ->unique()
            ->all();
        $query = RoomPost::query()->with('categoryroom', 'district', 'tags');

        if ($search != null) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($selectedRoomType != null) {
            if ($selectedRoomType !== 'all') {
                $query->where('category_room_id', $selectedRoomType);
            }
        }
        if ($selectedDistrict != null) {
            if ($selectedDistrict !== 'all') {
                $query->whereHas('district', function ($q) use ($selectedDistrict) {
                    $q->where('name', $selectedDistrict);
                });
            }
        }

        // Lọc theo giá
        if ($selectedPrice != null) {
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
        }
        // Lọc theo diện tích
        if ($selectedAcreage != null) {
            if ($selectedAcreage === 'allacreage') {
                // Không cần thêm điều kiện nếu chọn tất cả
            } elseif ($selectedAcreage === 'range_acreage1') {
                $query->whereBetween('acreage', [0, 20]);
            } elseif ($selectedAcreage === 'range_acreage2') {
                $query->whereBetween('acreage', [20, 30]);
            } elseif ($selectedAcreage === 'range_acreage3') {
                $query->whereBetween('acreage', [30, 45]);
            } elseif ($selectedAcreage === 'range_acreage4') {
                $query->where('acreage', '>=', 45);
            }
        }

        $room = $query->paginate(2);
        $totalResults = $room->total();

        return view('client.layouts.search', compact(
            'category_rooms',
            'wards',
            'districts',
            'room',
            'totalResults',
            'selectedPrice',
            'selectedAcreage',
            'selectedDistrict',
            'selectedRoomType',
            'search',
            'tags'
        ));
    }

    function roomPostDetail(String $id)
    {
        $search = request()->input('name_filter');
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
        // $rooms = RoomPost::with(['facilities' => function ($query) {
        //     $query->inRandomOrder()->take(6);
        // }]);
        $images = ImageRoom::query()->where('room_id', $id)->get();

        $tags = $roomposts->tags;
        return view('client.room-post.detail', compact('roomposts', 'images', 'caterooms', 'room_postss', 'categories', 'posts', 'tags'));
    }
}
