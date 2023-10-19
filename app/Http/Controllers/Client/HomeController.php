<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CategoryPost;
use App\Models\CategoryRoom;
use App\Models\District;
use App\Models\ImageRoom;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\RoomPost;
use App\Models\Ward;
use App\Models\Bookmark;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        $category_rooms = CategoryRoom::all()->where('status', 'active');
        $wards = Ward::all();
        $districts = District::whereHas('roomPosts', function ($query) {
            $query->where('status', 'accept');
        })->distinct()->pluck('name');
        $room_post_vip = RoomPost::with(['facilities' => function ($query) {
            $query->inRandomOrder()->take(6);
        }])
            ->where('status', 'accept')
            ->whereIn('service_id', [1, 2, 3])
            ->where('time_end', '>', Carbon::now())
            ->orderBy(DB::raw('FIELD(service_id, 1, 2, 3)'))
            ->limit(6)
            ->inRandomOrder()
            ->paginate(6);
        $posts = Post::with('user')->where('status', 'active')->latest('id')->limit(6)->get();
        $banners = Banner::query()->where('status', 'active')->latest()->limit(3)->get();
        //đếm số tin đăng ,user ,bài viết
        $count_room = count(RoomPost::all());
        $count_user = count(User::all());
        $count_post = count(Post::all());
        // Share media
        // $share_content=HOME_URL;
        // $shareComponent = \Share::page(
        //     $share_content,
        //     'chia se fb cua quang phuc vip pro',
        // )
        //     ->facebook()
        //     ->twitter()
        //     ->reddit();
        return view('client.layouts.home', compact('category_rooms', 'wards', 'districts', 'room_post_vip', 'posts', 'count_room', 'count_user', 'count_post', 'banners'));
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
        $category_rooms = CategoryRoom::all()->where('status', 'active');
        $districts = District::distinct()->pluck('name');
        if (Auth::check()) {
            $user_id = auth()->user()->id;
            $room_posts = RoomPost::latest()->with('facilities')->paginate(10);
            $data = Bookmark::where('user_id', $user_id)->with('roomPost')->paginate(6);
            $categories = CategoryRoom::withCount('roomPosts')
                ->having('room_posts_count', '>', 0)
                ->paginate(4);
            $posts = Post::latest()->paginate(5);
            return view('client.bookmark', compact('category_rooms', 'districts', 'data', 'categories', 'posts', 'room_posts'));
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
    public function filter_list(Request $request)
    {
        $category_rooms = CategoryRoom::query()->where('status', 'active')->latest()->get();
        $wards = Ward::query()->latest()->get();
        $districts = District::whereHas('roomPosts', function ($query) {
            $query->where('status', 'accept');
        })->distinct()->pluck('name');

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
        $query = RoomPost::query()
            ->with('categoryroom', 'district', 'tags')
            ->where('status', 'accept')
            ->where('time_end', '>', Carbon::now());

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

        // Sắp xếp bằng cách sử dụng CASE
        $query->orderByRaw("CASE WHEN service_id = 1 THEN 1 WHEN service_id = 2 THEN 2 WHEN service_id = 3 THEN 3 ELSE 4 END");
        $room = $query->paginate(5);
        $totalResults = $room->total();
        $currentDateTime = Carbon::now();
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

    public function countPrice() {
        // Thực hiện logic để đếm số lượng mục trong phạm vi giá cụ thể ($minPrice đến $maxPrice)
        // Replace this logic with your actual implementation
        
    }

    function roomPostDetail(String $id)
    {
        $category_rooms = CategoryRoom::all()->where('status', 'active');
        $districts = District::distinct()->pluck('name');
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
            ->where('status', 'accept')
            ->get();
        // $rooms = RoomPost::with(['facilities' => function ($query) {
        //     $query->inRandomOrder()->take(6);
        // }]);
        $images = ImageRoom::query()->where('room_id', $id)->get();
        $share_content = DETAIL_ROOM_URL;
        $id_roompost = RoomPost::query()->findOrFail($id);

        $shareComponent = \Share::page(
            $share_content . $id_roompost->id,
            'chia se fb cua quang phuc vip pro',
        )
            ->facebook()
            ->twitter()
            ->reddit();
        $tags = $roomposts->tags;
        return view('client.room-post.detail', compact('category_rooms', 'districts', 'roomposts', 'images', 'caterooms', 'room_postss', 'categories', 'posts','shareComponent'));

    }

    
}
