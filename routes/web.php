<?php

use App\Http\Controllers\ServicesController;
use App\Models\Services;

use App\Http\Controllers\Admin\CouponController;
use Illuminate\Support\Facades\Route;

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
Route::resource('services',\App\Http\Controllers\ServicesController::class);
Route::get('deleted-services', [ServicesController::class, 'deleted'])->name('deleted-services');
Route::delete('permanently-services/{id}', [ServicesController::class, 'permanentlyDelete'])->name('permanently-delete-services');
Route::get('restore-services/{id}', [ServicesController::class, 'restore'])->name('restore-services');

// mã giảm giá
Route::resource('coupon', CouponController::class);
// Route::prefix('coupon')->name('coupon.')->group(function () {
    Route::get('deleted', [CouponController::class, 'deleted'])->name('deleted');
    Route::delete('permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('permanently-delete');
    Route::get('restore/{id}', [CouponController::class, 'restore'])->name('restore');
// });

