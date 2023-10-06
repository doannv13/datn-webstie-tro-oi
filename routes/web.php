<?php


use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Client\PostController as ClientPost;;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryRoomController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\ChangeInfoController;
use App\Http\Controllers\Admin\SurroundingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\RoomPostController as CLientRoomPost;
use App\Http\Controllers\Admin\RoomPostController as AdminRoomPost;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Client\ServicesController as ClientServices;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

//CLIENT
Route::get('home-client', function () {
    return view('client.layouts.master');
})->name('home-client');
//Trang chủ
Route::get('trang-chu', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('dashboard-client', function () {
    return view('client.layouts.home'); // Trang chủ
});

//Đăng nhập, đăng ký
Route::get('client-signup', function () {
    return view('client.auth.register');
});
Route::get('client-login', function () {
    return view('client.auth.login');
});

//Bài viết
Route::resource('posts-client', ClientPost::class); // Danh sách bài viết
Route::get('posts-detail/{id}', [ClientPost::class, 'postDetail'])->name('posts-detail');

//Lọc và Tìm kiếm
// Route::post('fillter', [HomeController::class, 'filter_list']);
Route::get('search', [HomeController::class, 'index'])->name('search');
Route::match(['get', 'post'], 'search-fillter', [HomeController::class, 'fillter_list'])->name('search-fillter');
Route::get('room-post-detail/{id}', [HomeController::class, 'roomPostDetail'])->name('room-post-detail');

//Phân quyền start
Route::group(['middleware' => 'checkRole:vendor'], function () {
    // route dành cho vendor ở đây

    //Dịch vụ client
    Route::resource('services-room', ClientServices::class);

    // Thanh toán
    Route::get('display-QR', function () {
        return view('client.pay.display-QR');
    });
    Route::get('notification-pay', function () {
        return view('client.payment-status.notification-pay');
    });
    Route::get('notification-fail', function () {
        return view('client.payment-status.notification-fail');
    });

    // Room-Post-Client
    Route::resource('room-posts', CLientRoomPost::class);
    Route::get('room-posts-deleted', [CLientRoomPost::class, 'deleted'])->name('room-posts-deleted');
    Route::delete('room-posts-permanently/{id}', [CLientRoomPost::class, 'permanentlyDelete'])->name('room-posts-permanently-delete');
    Route::get('room-posts-restore/{id}', [CLientRoomPost::class, 'restore'])->name('room-posts-restore');
    Route::post('create-room-posts-image', [CLientRoomPost::class, 'createImage'])->name('create-room-post-image');
    Route::post('update-room-posts-image', [CLientRoomPost::class, 'editMultiImage'])->name('update-room-posts-image');
    Route::get('delete-room-posts-image/{id}', [CLientRoomPost::class, 'deleteMultiImage'])->name('delete-room-posts-image');
    //BookMark

    Route::get('bookmarks', [HomeController::class, 'listBookmark'])->name('list-bookmark');
    Route::post('bookmarks/{id}', [HomeController::class, 'bookmark'])->name('bookmark');
    Route::delete('unbookmarks/{id}', [HomeController::class, 'unBookmark'])->name('unbookmark');
    Route::delete('unbookmarkbm/{id}', [HomeController::class, 'unBookmarkbm'])->name('unbookmarkbm');

    //Thay đổi mật khẩu,thông tin client
    Route::resource('changeinfo', ChangeInfoController::class);
    Route::resource('changepassword', ChangePasswordController::class);
    Route::get('fogotpassword', function () {
        return view('client.auth.fogotPassword');
    });
});
Route::group(['middleware' => 'checkRole:admin'], function () {
    // route dành cho admin ở đây

    //ADMIN
    Route::get('home-admin', function () {
        return view('admin.layouts.master');
    })->name('home-admin');

    Route::get('dashboard-admin', function () {
        return view('admin.dashboard');
    });


    // Room-Post-Admin
    Route::resource('admin-room-posts', AdminRoomPost::class);
    Route::get('admin-room-posts-deleted', [AdminRoomPost::class, 'deleted'])->name('admin-room-posts-deleted');
    Route::delete('admin-room-posts-permanently/{id}', [AdminRoomPost::class, 'permanentlyDelete'])->name('admin-room-posts-permanently-delete');
    Route::get('admin-room-posts-restore/{id}', [AdminRoomPost::class, 'restore'])->name('admin-room-posts-restore');
    Route::get('admin-room-posts-status', [AdminRoomPost::class, 'changeStatus'])->name('admin-room-posts-status');

    // Category Home
    Route::resource('category-rooms', CategoryRoomController::class);
    Route::get('category-rooms-deleted', [CategoryRoomController::class, 'deleted'])->name('category-rooms-deleted');
    Route::delete('category-rooms-permanently/{id}', [CategoryRoomController::class, 'permanentlyDelete'])->name('category-rooms-permanently-delete');
    Route::get('category-rooms-restore/{id}', [CategoryRoomController::class, 'restore'])->name('category-rooms-restore');
    Route::get('category-rooms-status', [CategoryRoomController::class, 'changeStatus'])->name('category-rooms-status-change');

    // Facility
    Route::resource('facilities', FacilityController::class);
    Route::get('facilities-deleted', [FacilityController::class, 'listDeleted'])->name('facilities-deleted');
    Route::delete('facilities-permanently/{id}', [FacilityController::class, 'permanentlyDelete'])->name('facilities-permanently-delete');
    Route::get('facilities-restore/{id}', [FacilityController::class, 'restore'])->name('facilities-restore');


    // Setting
    Route::resource('settings', SettingController::class);

    // Banner
    Route::resource('banners', BannerController::class);
    Route::get('banners-deleted', [BannerController::class, 'deleted'])->name('banners-deleted');
    Route::delete('banners-permanently/{id}', [BannerController::class, 'permanentlyDelete'])->name('banners-permanently-delete');
    Route::get('banners-restore/{id}', [BannerController::class, 'restore'])->name('banners-restore');
    Route::get('banners-status', [BannerController::class, 'changeStatus'])->name('banners-status-change');


    // Advertisement (ảnh quảng cáo)
    Route::resource('advertisements', AdvertisementController::class);
    Route::get('advertisements-deleted', [AdvertisementController::class, 'deleted'])->name('advertisements-deleted');
    Route::delete('advertisements-permanently/{id}', [AdvertisementController::class, 'permanentlyDelete'])->name('advertisements-permanently-delete');
    Route::get('advertisements-restore/{id}', [AdvertisementController::class, 'restore'])->name('advertisements-restore');
    Route::get('/advertisements-status', [AdvertisementController::class, 'changeStatus'])->name('advertisements-status-change');



    //Post
    Route::resource('posts', PostController::class);
    Route::get('posts-deleted', [PostController::class, 'deleted'])->name('posts-deleted');
    Route::delete('posts-permanently/{id}', [PostController::class, 'permanentlyDelete'])->name('posts-permanently-delete');
    Route::get('posts-restore/{id}', [PostController::class, 'restore'])->name('posts-restore');
    Route::get('posts-status', [PostController::class, 'changeStatus'])->name('posts-status-change');

    // Category Post
    Route::resource('category-posts', CategoryPostController::class);
    Route::get('category-posts-deleted', [CategoryPostController::class, 'deleted'])->name('category-posts-deleted');
    Route::delete('category-posts-permanently/{id}', [CategoryPostController::class, 'permanentlyDelete'])->name('category-posts-permanently-delete');
    Route::get('category-posts-restore/{id}', [CategoryPostController::class, 'restore'])->name('category-posts-restore');
    Route::get('category-posts-status', [CategoryPostController::class, 'changeStatus'])->name('category-posts-status-change');

    // Tag
    Route::resource('tags', TagController::class);
    Route::get('tags-deleted', [TagController::class, 'deleted'])->name('tags-deleted');
    Route::delete('tags-permanently/{id}', [TagController::class, 'permanentlyDelete'])->name('tags-permanently-delete');
    Route::get('tags-restore/{id}', [TagController::class, 'restore'])->name('tags-restore');
    Route::get('tags-status', [TagController::class, 'changeStatus'])->name('tags-status-change');

    // Dịch vụ
    Route::resource('services', ServicesController::class);
    Route::get('services-deleted', [ServicesController::class, 'deleted'])->name('services-deleted');
    Route::delete('services-permanently/{id}', [ServicesController::class, 'permanentlyDelete'])->name('services-permanently-delete');
    Route::get('services-restore/{id}', [ServicesController::class, 'restore'])->name('services-restore');

    // Mã giảm giá
    Route::resource('coupons', CouponController::class);
    Route::get('coupons-deleted', [CouponController::class, 'deleted'])->name('coupons-deleted');
    Route::delete('coupons-permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('coupons-permanently-delete');
    Route::get('coupons-restore/{id}', [CouponController::class, 'restore'])->name('coupons-restore');
    Route::get('coupons-status', [CouponController::class, 'changeStatus'])->name('coupons-status-change');


    //Quản lý người dùng
    Route::resource('users', UserController::class);
    Route::get('users-deleted', [UserController::class, 'deleted'])->name('users-deleted');
    Route::delete('users-permanently/{id}', [UserController::class, 'permanentlyDelete'])->name('users-permanently-delete');
    Route::get('users-restore/{id}', [UserController::class, 'restore'])->name('users-restore');



    // Facility
    Route::resource('surroundings', SurroundingController::class);
    Route::get('surroundings-deleted', [SurroundingController::class, 'listDeleted'])->name('surroundings-deleted');
    Route::delete('surroundings-permanently/{id}', [SurroundingController::class, 'permanentlyDelete'])->name('surroundings-permanently-delete');
    Route::get('surroundings-restore/{id}', [SurroundingController::class, 'restore'])->name('surroundings-restore');

    //Admin/chang info
    Route::get('admin-change-info/{id}', [ChangeInfoController::class, 'adminEdit'])->name('admin-edit-info');
    Route::put('admin-change-info/{id}', [ChangeInfoController::class, 'adminUpdate'])->name('admin-change-info');

    //Admin/chang password
    Route::get('admin-change-password/{id}', [ChangePasswordController::class, 'adminEditPassword'])->name('admin-edit-password');
    Route::put('admin-change-password/{id}', [ChangePasswordController::class, 'adminUpdatePassword'])->name('admin-change-password');

});
// Phân quyền end
