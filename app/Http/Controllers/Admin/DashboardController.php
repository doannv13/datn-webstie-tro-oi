<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CategoryPost;
use App\Models\CategoryRoom;
use App\Models\Coupon;
use App\Models\Facility;
use App\Models\Post;
use App\Models\RoomPost;
use App\Models\Surrounding;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        // thống kê tin phòng
        $countRoomPost = RoomPost::all()->count();
        $countRoomPostToActive = RoomPost::where('status', 'accept')->count();
        $today = now()->toDateString(); // Lấy ngày hôm nay
        $countRoomPostToDay = RoomPost::whereDate('created_at', $today)
            ->where('status', 'accept')
            ->count();

        // thống kê danh mục phòng
        $countCategoryRoomPost = CategoryRoom::all()->count();
        $countCategoryRoomPostToActive = CategoryRoom::where('status', 'active')->count();
        $countCategoryRoomPostToDay = CategoryRoom::whereDate('created_at', $today)
            ->where('status', 'active')
            ->count();

        // thống kê danh mục bài viết
        $countCategoryPost = CategoryPost::all()->count();
        $countCategoryPostToActive = CategoryPost::where('status', 'active')->count();
        $countCategoryPostToDay = CategoryPost::whereDate('created_at', $today)
            ->where('status', 'active')
            ->count();

        // thống kê bài viết
        $countPost = Post::all()->count();
        $countPostToActive = Post::where('status', 'active')->count();
        $countPostToDay = Post::whereDate('created_at', $today)
            ->where('status', 'active')
            ->count();

        // thống kê tài khoản
        $countAccount = User::all()->count();

        // thống kê tài khoản Admin
        $countAccountAdmin = User::where('role', 'admin')->count();
        $countAccountAdminToDay = User::whereDate('created_at', $today)
            ->where('role', 'admin')
            ->count();

        // thống kê tài khoản Vendor
        $countAccountVendor = User::where('role', 'vendor')->count();
        $countAccountVendorToDay = User::whereDate('created_at', $today)
            ->where('role', 'vendor')
            ->count();

        // thống kê Vai trò
        $countRole = Role::all()->count();
        
        // thống kê quyền
        $countPermission = Permission::all()->count();

        // thống kê tiện ích
        $countFacility = Facility::all()->count();

        // thống kê xung quanh
        $countSurrounding = Surrounding::all()->count();

        // thống kê mã giảm giá
        $countCoupon = Coupon::all()->count();
        $countCouponToActive = Coupon::where('status', 'active')->count();

        // thống kê mã giảm giá
        $countBanner = Banner::all()->count();
        $countBannerToActive = Banner::where('status', 'active')->count();
        

        return view('admin.dashboard', compact(
            'countRoomPostToDay',
            'countRoomPostToActive',
            'countRoomPost',
            'countCategoryRoomPost',
            'countCategoryRoomPostToActive',
            'countCategoryRoomPostToDay',
            'countCategoryPost',
            'countCategoryPostToActive',
            'countCategoryPostToDay',
            'countPost',
            'countPostToActive',
            'countPostToDay',
            'countAccount',
            'countAccountAdmin',
            'countAccountAdminToDay',
            'countAccountVendor',
            'countAccountVendorToDay',
            'countRole',
            'countPermission',
            'countFacility',
            'countSurrounding',
            'countCoupon',
            'countCouponToActive',
            'countBanner',
            'countBannerToActive'
        ));
    }
}
