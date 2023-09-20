<?php

use App\Http\Controllers\Admin\CategoryRoomController;
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
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categoryrooms', CategoryRoomController::class);
// Route::prefix('coupon')->name('coupon.')->group(function () {
Route::get('deleted', [CategoryRoomController::class, 'deleted'])->name('categoryrooms.deleted');
Route::delete('permanently/{id}', [CategoryRoomController::class, 'permanentlyDelete'])->name('categoryrooms.permanently-delete');
Route::get('restore/{id}', [CategoryRoomController::class, 'restore'])->name('restore');
// });
