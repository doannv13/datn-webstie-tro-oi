<?php

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



//Coupon
Route::resource('coupon', CouponController::class);
// Route::prefix('coupon')->name('coupon.')->group(function () {
    Route::get('deleted', [CouponController::class, 'deleted'])->name('coupon.deleted');
    Route::delete('permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('coupon.permanently-delete');
    Route::get('restore/{id}', [CouponController::class, 'restore'])->name('coupon.restore');
// });


//Post
Route::resource('categorypost', \App\Http\Controllers\Admin\CategoryPostController::class);
Route::get('categorypost-deleted', [\App\Http\Controllers\Admin\CategoryPostController::class, 'deleted'])->name('categorypost.deleted');
Route::delete('categorypost/permanently/{id}', [\App\Http\Controllers\Admin\CategoryPostController::class, 'permanentlyDelete'])->name('categorypost.permanently-delete');
Route::get('categorypost/restore/{id}', [\App\Http\Controllers\Admin\CategoryPostController::class, 'restore'])->name('categorypost.restore');
