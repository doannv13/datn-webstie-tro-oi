<?php

use App\Http\Controllers\Admin\FacilityController;
use Database\Factories\FacilityFactory;
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

Route::resource('facilities', FacilityController::class);


Route::get('list-deleted', [FacilityController::class, 'listDeleted'])->name('facilities-deleted');

Route::delete('facilities/permanently/{id}', [FacilityController::class, 'permanentlyDelete'])->name('facilities-permanently-delete');

Route::get('restore/{id}', [FacilityController::class, 'restore'])->name('facilities-restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
