<?php

use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CouponController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
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
    return view('welcome');
});
Route::get('home', function () {
    return view('admin.layouts.master');
});
Route::get('dashboard', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// dịch vụ
Route::resource('services',\App\Http\Controllers\Admin\ServicesController::class);
Route::get('services-deleted', [ServicesController::class, 'deleted'])->name('services.deleted');
Route::delete('services-permanently/{id}', [ServicesController::class, 'permanentlyDelete'])->name('services.permanently.delete');
Route::get('services-restore/{id}', [ServicesController::class, 'restore'])->name('services.restore');
// mã giảm giá
Route::resource('coupon', CouponController::class);
// Route::prefix('coupon')->name('coupon.')->group(function () {
    Route::get('deleted', [CouponController::class, 'deleted'])->name('deleted');
    Route::delete('permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('permanently-delete');
    Route::get('restore/{id}', [CouponController::class, 'restore'])->name('restore');
// });
//quản lí người dùng
Route::resource('users',UserController::class);
Route::get('user_deleted', [UserController::class, 'deleted'])->name('user_deleted');
Route::delete('user_permanently/{id}', [UserController::class, 'permanentlyDelete'])->name('user_permanently_delete');
Route::get('user_restore/{id}', [UserController::class, 'restore'])->name('user_restore');















//phân quyền start
Route::group(['middleware' => 'checkRole:vendor'], function () {
    // route dành cho vendor ở đây
});
Route::group(['middleware' => 'checkRole:admin'], function () {
    // route dành cho admin ở đây
});

//phân quyền end
