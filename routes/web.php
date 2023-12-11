<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\VariationController;
use App\Models\Products;

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

Route::get('/', [FrontendController::class, 'frontend_master'])->name('frontend_master');
Route::get('/home', [HomeController::class, 'dashboard_home'])->name('dashboard_home');
Route::get('/about', [FrontendController::class, 'frontend_about'])->name('frontend_about');
Route::get('/contact', [FrontendController::class, 'frontend_contact'])->name('frontend_contact');
Route::post('/contact/message', [FrontendController::class, 'contact_message'])->name('contact_post');
Route::get('/account/registration', [FrontendController::class, 'account_registration'])->name('account_registration');

//frontend Routes


// Fetch Users

Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::post('/add/users', [HomeController::class, 'add_users'])->name('add_users');
Route::get('/user/details/{id}', [HomeController::class, 'user_details'])->name('user_details');
Route::get('/edit/user/{id}', [HomeController::class, 'edit_user'])->name('edit_user');
Route::post('/update/user/{id}', [HomeController::class, 'update_user'])->name('update_user');
Route::get('/user/remove/{id}', [HomeController::class, 'user_remove'])->name('user_remove');

// Fetch Users

// filter Users

Route::get('/moderators', [HomeController::class, 'moderator'])->name('filter_moderator');
Route::get('/admins', [HomeController::class, 'filter_admin'])->name('filter_admin');
Route::get('/sellers', [HomeController::class, 'filter_sellers'])->name('filter_sellers');
Route::get('/customers', [HomeController::class, 'filter_customers'])->name('filter_customers');

// filter Users

//frontend account Registraion routes

Route::post('/customer/registraion', [CustomerController::class, 'customer_registration'])->name('customer_registration');
Route::post('/seller/registraion', [SellerController::class, 'seller_registration'])->name('seller_registration');
Route::get('/seller/dashboard', [FrontendController::class, 'seller_dashboard'])->name('seller_dashboard');

//frontend account Registraion routes

//frontend account signup route
Route::get('/account/login', [FrontendController::class, 'account_login'])->name('account_login');
//frontend account signup route



//Dashboard Routes
Route::get('/dashboard/home', [HomeController::class, 'dashboard_home'])->name('dashboard_home');
Route::get('/dashboard/profile', [ProfileController::class, 'profile'])->name('dashboard_profile');
//Dashboard Routes

//frontEnd Login Routes
Route::post('/accounts', [FrontendController::class, 'accounts'])->name('accounts');
//frontEnd Login Routes

//frontEnd Profile Update Routes
Route::post('/accounts/update', [SellerController::class, 'accounts_update'])->name('accounts_update');
//frontEnd Profile Update Routes

//Profile Photo and Cover Photo route

Route::post('/profile/photo/upload', [ProfileController::class, 'profile_photo_upload'])->name('profile_photo_upload');

Route::post('/cover/photo/upload', [ProfileController::class, 'cover_photo_upload'])->name('cover_photo_upload');

//Profile Photo and Cover Photo route


//Password change route
Route::post('/password/check', [ProfileController::class, 'password_check'])->name('password_check');
Route::post('/password/change', [ProfileController::class, 'password_changed'])->name('password_changed');
//Password change route

//phone_number Verify route
Route::post('/phone/number/add', [ProfileController::class, 'phone_number_add'])->name('phone_number_add');
Route::get('/verify/otp/send', [ProfileController::class, 'verify_otp_send'])->name('verify_otp_send');
Route::post('/verify/otp/confirm', [ProfileController::class, 'verify_otp_confirm'])->name('verify_otp_confirm');
//phone_number Verify route


//update phone_number
Route::get('/update/phone/number', [ProfileController::class, 'update_number_add'])->name('update_number_add');
//update phone_number 

//Category Routes
Route::resource('category', CategoryController::class);
//Category Routes

// Category Trash Routes
Route::get('trash/category/',[CategoryController::class, 'category_trash'])->name('category_trash');
Route::get('trash/category/{id}',[CategoryController::class, 'category_trash_details'])->name('category_trash_details');
Route::get('trash/category/restore/{id}',[CategoryController::class, 'category_trash_restore'])->name('category_trash_restore');
Route::get('trash/category/permanent/delete/{id}',[CategoryController::class, 'category_trash_delete'])->name('category_trash_delete');
Route::get('trash/empty-trash',[CategoryController::class, 'empty_category_trash'])->name('empty_category_trash');
Route::get('trash/resotre-trash',[CategoryController::class, 'restore_category_trash'])->name('restore_category_trash');
Route::get('trash/resotre-pluck',[CategoryController::class, 'restore_category_pulck'])->name('restore_category_pulck');
//Category Trash Routes

// Products Trash Routes
Route::get('trash/product',[ProductsController::class, 'product_trash'])->name('product_trash');
Route::get('trash/product/{id}',[ProductsController::class, 'product_trash_details'])->name('product_trash_details');
Route::get('trash/product/restore/{id}',[ProductsController::class, 'product_trash_restore'])->name('product_trash_restore');
Route::get('trash/product/permanent/delete/{id}',[ProductsController::class, 'product_trash_delete'])->name('product_trash_delete');
Route::get('trash-product/empty-trash',[ProductsController::class, 'empty_product_trash'])->name('empty_product_trash');
Route::get('trash-product/resotre-trash',[ProductsController::class, 'restore_product_trash'])->name('restore_product_trash');
// Route::get('trash-product/resotre-pluck',[ProfileController::class, 'restore_category_pulck'])->name('restore_product_pulck');
//Products Trash Routes


//Products Routes
Route::resource('products', ProductsController::class);
//Products Routes

// Github Signin Routes

Route::post('/github/redirect', [SocialiteController::class, 'github_redirect'])->name('github_redirect');
Route::get('/github/callback', [SocialiteController::class, 'github_callback'])->name('github_callback');

// Github Signin Routes

// Google Signin Routes

Route::post('/google/redirect', [SocialiteController::class, 'google_redirect'])->name('google_redirect');
Route::get('/google/callback', [SocialiteController::class, 'google_callback'])->name('google_callback');

// Google Signin Routes


// Contact Us Email Routes
Route::get('contact/emails', [ContactController::class, 'contact_us_emails'])->name('contact_us_emails');
Route::get('emails/{id}', [ContactController::class, 'emails'])->name('emails');
Route::post('contact/email/delete/{id}', [ContactController::class, 'contact_delete'])->name('contact_delete');
// Contact Us Email Routes

// Contact Trash Routes
Route::get('contact/emails/trash', [ContactController::class, 'trash_emails'])->name('trash_emails');
Route::get('contact/emails/restore/{id}', [ContactController::class, 'restore_emails'])->name('restore_emails');
Route::get('contact/emails/delete/{id}', [ContactController::class, 'delete_emails'])->name('delete_emails');
Route::get('contact/emails/details/{id}', [ContactController::class, 'trash_email_details'])->name('trash_email_details');
Route::get('contact/emails/restore-all', [ContactController::class, 'restoreAll_emails'])->name('restoreAll_emails');
Route::get('contact/emails/delete-all', [ContactController::class, 'deleteAll_emails'])->name('deleteAll_emails');
// Contact Trash Routes


// Email Subscriber Routes
Route::post('subscribe/emails', [FrontendController::class, 'subscribe_email'])->name('subscribe_email');
// Email Subscriber Routes


// product Page Routes
Route::get('product/{id}/{name}', [ProductsController::class, 'productDetails'])->name('productDetails');
// product Page Routes

// Variation Routes
Route::resource('variation', VariationController::class);
// Variation Routes

// // Colors Routes
// Route::resource('color', ColorController::class);
// // Color Routes
