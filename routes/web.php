<?php

use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CouponController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;

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

// Auth::routes();


// Setting
Route::resource('setting', SettingController::class);

//Post
Route::resource('categorypost', \App\Http\Controllers\Admin\CategoryPostController::class);
Route::get('categorypost-deleted', [\App\Http\Controllers\Admin\CategoryPostController::class, 'deleted'])->name('categorypost.deleted');
Route::delete('categorypost/permanently/{id}', [\App\Http\Controllers\Admin\CategoryPostController::class, 'permanentlyDelete'])->name('categorypost.permanently-delete');
Route::get('categorypost/restore/{id}', [\App\Http\Controllers\Admin\CategoryPostController::class, 'restore'])->name('categorypost.restore');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// dịch vụ
Route::resource('services',\App\Http\Controllers\Admin\ServicesController::class);
Route::get('services/deleted', [ServicesController::class, 'deleted'])->name('services.deleted');
Route::delete('services/permanently/{id}', [ServicesController::class, 'permanentlyDelete'])->name('services.permanently.delete');
Route::get('services/restore/{id}', [ServicesController::class, 'restore'])->name('services.restore');

// mã giảm giá
Route::resource('coupon', CouponController::class);
// Route::prefix('coupon')->name('coupon.')->group(function () {
    Route::get('coupon/deleted', [CouponController::class, 'deleted'])->name('coupon.deleted');
    Route::delete('coupon/permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('coupon.permanently-delete');
    Route::get('coupon/restore/{id}', [CouponController::class, 'restore'])->name('coupon.restore');
// });
