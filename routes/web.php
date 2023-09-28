<?php


use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryRoomController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\ChangeInfoController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\SurroundingController;
use App\Http\Controllers\Client\RoomPostController;
use App\Http\Controllers\Admin\BannerController;

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

Route::get('/', function () {
    return view('client.layouts.master');
});

//ADMIN

Route::get('home-admin', function () {
    return view('admin.layouts.master');
})->name('home-admin');

Route::get('dashboard', function () {
    return view('admin.dashboard');
});

//CLIENT
Route::get('home-client', function () {
    return view('client.layouts.master');

})->name('home-client');
Route::get('home-client', function () {
    return view('client.layouts.home'); // Trang chủ
});



// Room
Route::resource('room-post', RoomPostController::class);
Route::get('room_deleted', [RoomPostController::class, 'deleted'])->name('room_deleted');
Route::delete('room_permanently/{id}', [RoomPostController::class, 'permanentlyDelete'])->name('room_permanently_delete');
Route::get('room_restore/{id}', [RoomPostController::class, 'restore'])->name('room_restore');
Route::get('trang-chu',[HomeController::class, 'index'])->name('home');
Route::post('fillter',[HomeController::class, 'filter_list']);
Route::get('search', [HomeController::class, 'index'])->name('search');
Route::post('search-fillter', [HomeController::class, 'fillter_list'])->name('search-fillter');



// Category Home
Route::resource('categoryrooms', CategoryRoomController::class);
Route::get('deleted', [CategoryRoomController::class, 'deleted'])->name('categoryrooms.deleted');
Route::delete('permanently/{id}', [CategoryRoomController::class, 'permanentlyDelete'])->name('categoryrooms.permanently-delete');
Route::get('restore/{id}', [CategoryRoomController::class, 'restore'])->name('restore');



// Facility
Route::resource('facilities', FacilityController::class);
Route::get('list-deleted', [FacilityController::class, 'listDeleted'])->name('facilities-deleted');
Route::delete('facilities/permanently/{id}', [FacilityController::class, 'permanentlyDelete'])->name('facilities-permanently-delete');
Route::get('restore/{id}', [FacilityController::class, 'restore'])->name('facilities-restore');
Auth::routes();


// Setting
Route::resource('setting', SettingController::class);

// Banner
Route::resource('banner', BannerController::class);
Route::get('banner-deleted', [BannerController::class, 'deleted'])->name('banner.deleted');
Route::delete('banner/permanently/{id}', [BannerController::class, 'permanentlyDelete'])->name('banner.permanently.delete');
Route::get('banner/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');

Route::get('/banner-status', [BannerController::class, 'changeStatus'])->name('banner.status_change');


//Post
Route::resource('categorypost', \App\Http\Controllers\Admin\CategoryPostController::class);
Route::get('categorypost-deleted', [\App\Http\Controllers\Admin\CategoryPostController::class, 'deleted'])->name('categorypost.deleted');
Route::delete('categorypost/permanently/{id}', [\App\Http\Controllers\Admin\CategoryPostController::class, 'permanentlyDelete'])->name('categorypost.permanently-delete');
Route::get('categorypost/restore/{id}', [\App\Http\Controllers\Admin\CategoryPostController::class, 'restore'])->name('categorypost.restore');
Route::get('/home', function(){
    return view('client.layouts.home');
})->name('home');

// Dịch vụ

Route::resource('services', \App\Http\Controllers\Admin\ServicesController::class);
Route::get('services-deleted', [ServicesController::class, 'deleted'])->name('services.deleted');
Route::delete('services-permanently/{id}', [ServicesController::class, 'permanentlyDelete'])->name('services.permanently.delete');
Route::get('services-restore/{id}', [ServicesController::class, 'restore'])->name('services.restore');


// Mã giảm giá
Route::resource('coupon', CouponController::class);
Route::get('coupon-deleted', [CouponController::class, 'deleted'])->name('coupon.deleted');
Route::delete('coupon-permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('coupon.permanently-delete');
Route::get('coupon-restore/{id}', [CouponController::class, 'restore'])->name('coupon.restore');

//Quản lý người dùng
Route::resource('users', UserController::class);
Route::get('user_deleted', [UserController::class, 'deleted'])->name('user_deleted');
Route::delete('user_permanently/{id}', [UserController::class, 'permanentlyDelete'])->name('user_permanently_delete');
Route::get('user_restore/{id}', [UserController::class, 'restore'])->name('user_restore');
Route::get('client-login',function(){
    return view('client.auth.login');
});
Route::get('client-signup',function(){
    return view('client.auth.register');
});
Route::resource('changeinfo', ChangeInfoController::class);
Route::resource('changepassword', ChangePasswordController::class);
Route::get('fogotpassword',function () {
    return view('client.auth.fogotPassword');
});

// Facility
Route::resource('surrounding', SurroundingController::class);
Route::get('surrounding-deleted', [SurroundingController::class, 'listDeleted'])->name('surrounding-deleted');
Route::delete('surrounding-permanently/{id}', [SurroundingController::class, 'permanentlyDelete'])->name('surrounding-permanently-delete');
Route::get('surrounding-restore/{id}', [SurroundingController::class, 'restore'])->name('surrounding-restore');


//Admin/chang info
Route::get('admin-changeinfo/{id}',[ChangeInfoController::class,'adminedit'])->name('admin-editinfo');
Route::put('admin-changeinfo/{id}',[ChangeInfoController::class,'adminupdate'])->name('admin-changeinfo');
//Admin/chang password
Route::get('admin-changepassword/{id}',[ChangePasswordController::class,'admineditpw'])->name('admin-editpassword');
Route::put('admin-changepassword/{id}',[ChangePasswordController::class,'adminupdatepw'])->name('admin-changepassword');








//Phân quyền start
Route::group(['middleware' => 'checkRole:vendor'], function () {
    // route dành cho vendor ở đây
});
Route::group(['middleware' => 'checkRole:admin'], function () {
    // route dành cho admin ở đây
});
// Phân quyền end
