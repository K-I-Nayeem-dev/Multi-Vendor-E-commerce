<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
// use Illuminate\Support\Facades\Auth;

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

//frontend Routes
Route::get('/', [App\Http\Controllers\FrontendController::class, 'frontend_master'])->name('frontend_master');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard_home'])->name('dashboard_home');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'frontend_about'])->name('frontend_about');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'frontend_contact'])->name('frontend_contact');
Route::post('/contact/message', [App\Http\Controllers\FrontendController::class, 'contact_message'])->name('contact_post');
Route::get('/account/registration', [App\Http\Controllers\FrontendController::class, 'account_registration'])->name('account_registration');
//frontend Routes


// Fetch Users

Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::post('/add/users', [App\Http\Controllers\HomeController::class, 'add_users'])->name('add_users');
Route::get('/user/details/{id}', [App\Http\Controllers\HomeController::class, 'user_details'])->name('user_details');
Route::get('/edit/user/{id}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('edit_user');
Route::post('/update/user/{id}', [App\Http\Controllers\HomeController::class, 'update_user'])->name('update_user');

// Fetch Users


//frontend account Registraion routes

Route::post('/customer/registraion', [App\Http\Controllers\CustomerController::class, 'customer_registration'])->name('customer_registration');

Route::post('/seller/registraion', [App\Http\Controllers\SellerController::class, 'seller_registration'])->name('seller_registration');

Route::get('/seller/dashboard', [App\Http\Controllers\FrontendController::class, 'seller_dashboard'])->name('seller_dashboard');

//frontend account Registraion routes

//frontend account signup route
Route::get('/account/login', [App\Http\Controllers\FrontendController::class, 'account_login'])->name('account_login');
//frontend account signup route



//Dashboard Routes
Route::get('/dashboard/home', [App\Http\Controllers\HomeController::class, 'dashboard_home'])->name('dashboard_home');
Route::get('/dashboard/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('dashboard_profile');
//Dashboard Routes

//frontEnd Login Routes
Route::post('/accounts', [App\Http\Controllers\FrontendController::class, 'accounts'])->name('accounts');
//frontEnd Login Routes

//frontEnd Profile Update Routes
Route::post('/accounts/update', [App\Http\Controllers\SellerController::class, 'accounts_update'])->name('accounts_update');
//frontEnd Profile Update Routes

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

//Category Routes
Route::resource('category', CategoryController::class);
//Category Routes

// Github Signin Routes

Route::post('/github/redirect', [App\Http\Controllers\SocialiteController::class, 'github_redirect'])->name('github_redirect');
Route::get('/github/callback', [App\Http\Controllers\SocialiteController::class, 'github_callback'])->name('github_callback');

// Github Signin Routes


// Contact Us Email Routes
Route::get('contact/emails', [App\Http\Controllers\ContactController::class, 'contact_us_emails'])->name('contact_us_emails');
Route::get('emails/{id}', [App\Http\Controllers\ContactController::class, 'emails'])->name('emails');
Route::post('contact/email/delete/{id}', [App\Http\Controllers\ContactController::class, 'contact_delete'])->name('contact_delete');
// Contact Us Email Routes
