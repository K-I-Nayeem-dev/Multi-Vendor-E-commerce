<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


//Dashboard Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard_home'])->name('dashboard_home');
Route::get('/dashboard/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('dashboard_profile');
//Dashboard Routes


//Profile Photo and Cover Photo route
Route::post('/profile/photo/upload', [App\Http\Controllers\ProfileController::class, 'profile_photo_upload'])->name('profile_photo_upload');
Route::post('/cover/photo/upload', [App\Http\Controllers\ProfileController::class, 'cover_photo_upload'])->name('cover_photo_upload');

//Profile Photo and Cover Photo route


//Password change route
Route::post('/password/check', [App\Http\Controllers\ProfileController::class, 'password_check'])->name('password_check');
Route::post('/password/change', [App\Http\Controllers\ProfileController::class, 'password_changed'])->name('password_changed');
//Password change route

//phone_number Verify route
Route::post('/phone/number/add', [App\Http\Controllers\ProfileController::class, 'phone_number_add'])->name('phone_number_add');
Route::get('/verify/otp/send', [App\Http\Controllers\ProfileController::class, 'verify_otp_send'])->name('verify_otp_send');
Route::post('/verify/otp/confirm', [App\Http\Controllers\ProfileController::class, 'verify_otp_confirm'])->name('verify_otp_confirm');
//phone_number Verify route


//update phone_number
Route::get('/update/phone/number', [App\Http\Controllers\ProfileController::class, 'update_number_add'])->name('update_number_add');
//update phone_number 