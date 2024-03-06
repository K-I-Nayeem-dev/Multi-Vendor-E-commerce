<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvetoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'web'], function () {

    //frontend Routes
    Route::group(['controller' => FrontendController::class], function () {
        // E-commerce Route
        Route::get('/', 'frontend_master')->name('frontend_master');
        Route::get('/about', 'frontend_about')->name('frontend_about');
        Route::get('/contact', 'frontend_contact')->name('frontend_contact');
        Route::post('/contact/message', 'contact_message')->name('contact_post');
        Route::get('/account/registration', 'account_registration')->name('account_registration');
        Route::get('/seller/dashboard', 'seller_dashboard')->name('seller_dashboard');

        //frontend account signup route
        Route::get('/account/login', 'account_login')->name('account_login');

        //frontEnd Login Routes
        Route::post('/accounts', 'accounts')->name('accounts');

        // Email Subscriber Routes
        Route::post('/subscribe/emails', 'subscribe_email')->name('subscribe_email');

    });

    // user route
    Route::group(['prefix' => 'user', 'controller' => HomeController::class], function () {
        Route::get('/', 'users')->name('users');
        Route::get('/details/{id}', 'user_details')->name('user_details');
        Route::get('/remove/{id}', 'user_remove')->name('user_remove');
    });

    Route::group(['controller' => HomeController::class], function () {

        Route::get('/home', 'dashboard_home')->name('dashboard_home');

        // Fetch User
        Route::post('/add/users', 'add_users')->name('add_users');
        Route::get('/edit/user/{id}', 'edit_user')->name('edit_user');
        Route::post('/update/user/{id}', 'update_user')->name('update_user');

        // filter Users
        Route::get('/moderators', 'moderator')->name('filter_moderator');
        Route::get('/admins', 'filter_admin')->name('filter_admin');
        Route::get('/sellers', 'filter_sellers')->name('filter_sellers');
        Route::get('/customers', 'filter_customers')->name('filter_customers');
        // filter Users

        //dashboard Route
        Route::get('/dashboard', 'dashboard_home')->name('dashboard_home');

    });

    // User Route

    // Github Signin Routes
    Route::group(['prefix' => '/github', 'controller' => SocialiteController::class], function () {
        Route::post('/redirect', 'github_redirect')->name('github_redirect');
        Route::get('/callback', 'github_callback')->name('github_callback');
    });
    // Github Signin Routes

    // Google Signin Routes
    Route::group(['prefix' => '/google', 'controller' => SocialiteController::class], function () {
        Route::post('/redirect', 'google_redirect')->name('google_redirect');
        Route::get('/callback', 'google_callback')->name('google_callback');
    });
    // Google Signin Routes

    // Checkout Route
    Route::group(['controller' => CheckoutController::class], function () {
        Route::get('/check-out', 'check_out')->name('check_out');
    });
    // Checkout Route

    //CartRoute
    Route::group(['controller' => CartController::class, 'middleware' => ['auth', 'verified']], function () {
        Route::get('/cartview', 'cartview')->name('cartview');
        Route::get('/add_to_wishlist/{id}', 'add_to_wishlist')->name('add_to_wishlist');
        Route::get('/add_to_cart/{id}', 'add_to_cart')->name('add_to_cart');
        Route::get('/cart_products', 'cart_products')->name('cart_product');
        Route::post('/cart', 'cart')->name('cart');
    });
    //CartRoute

    // product Page Routes
    Route::group(['controller' => ProductsController::class], function () {
        Route::get('/product/{id}/{name}', 'productDetails')->name('productDetails');

    });
    // product Page Routes

    // Seller Controller
    Route::group(['controller' => SellerController::class], function () {
        Route::post('/accounts/update', 'accounts_update')->name('accounts_update');
        Route::post('/seller/registraion', 'seller_registration')->name('seller_registration');
    });

    // Customer Controller
    Route::group(['controller' => CustomerController::class], function () {
        Route::post('/customer/registraion', 'customer_registration')->name('customer_registration');
    });

    //Resource Routes
    Route::resources([
        'category' => CategoryController::class,
        'products' => ProductsController::class,
        'variation' => VariationController::class,
        'color' => ColorController::class,
        'inventory' => InvetoryController::class,
        'wishlist' => WishlistController::class,
    ]);

    // Profile Controller
    Route::group(['controller' => ProfileController::class], function () {
        Route::get('/dashboard/profile', 'profile')->name('dashboard_profile');
        Route::post('/profile/photo/upload', 'profile_photo_upload')->name('profile_photo_upload');
        Route::post('/cover/photo/upload', 'cover_photo_upload')->name('cover_photo_upload');
        Route::post('/phone/number/add', 'phone_number_add')->name('phone_number_add');
        Route::get('/verify/otp/send', 'verify_otp_send')->name('verify_otp_send');
        Route::post('/verify/otp/confirm', 'verify_otp_confirm')->name('verify_otp_confirm');
        Route::get('/update/phone/number', 'update_number_add')->name('update_number_add');
    });

    //Password change route
    Route::group(['prefix' => '/password', 'controller' => ProfileController::class], function () {
        Route::post('/check', 'password_check')->name('password_check');
        Route::post('/change', 'password_changed')->name('password_changed');
    });
    //Password change route

    //Category Routes

    // Category Trash Routes
    Route::group(['prefix' => '/trash', 'controller' => CategoryController::class], function () {
        Route::get('/category', 'category_trash')->name('category_trash');
        Route::get('/category/{id}', 'category_trash_details')->name('category_trash_details');
        Route::get('/category/restore/{id}', 'category_trash_restore')->name('category_trash_restore');
        Route::get('/category/permanent/delete/{id}', 'category_trash_delete')->name('category_trash_delete');
        Route::get('/empty-trash', 'empty_category_trash')->name('empty_category_trash');
        Route::get('/resotre-trash', 'restore_category_trash')->name('restore_category_trash');
        Route::get('/resotre-pluck', 'restore_category_pulck')->name('restore_category_pulck');
    });
    //Category Trash Routes

    // Products Trash Routes
    Route::group(['prefix' => 'trash/product', 'controller' => ProductsController::class], function () {
        Route::get('/', 'product_trash')->name('product_trash');
        Route::get('/{id}', 'product_trash_details')->name('product_trash_details');
        Route::get('/restore/{id}', 'product_trash_restore')->name('product_trash_restore');
        Route::get('/permanent/delete/{id}', 'product_trash_delete')->name('product_trash_delete');
        Route::get('/empty-trash', 'empty_product_trash')->name('empty_product_trash');
        Route::get('/resotre-trash', 'restore_product_trash')->name('restore_product_trash');
        // Route::get('/trash-product/resotre-pluck',[ProfileController::class, 'restore_category_pulck'])->name('restore_product_pulck');
    });

    // Contact Controller
    Route::group(['prefix' => '/contact/emails', 'controller' => ContactController::class], function () {
        Route::get('/', 'contact_us_emails')->name('contact_us_emails');
        Route::get('/{id}', 'emails')->name('emails');
        Route::post('/delete/{id}', 'contact_delete')->name('contact_delete');
        Route::get('/trash', 'trash_emails')->name('trash_emails');
        Route::get('/restore/{id}', 'restore_emails')->name('restore_emails');
        Route::get('/delete/{id}', 'delete_emails')->name('delete_emails');
        Route::get('/details/{id}', 'trash_email_details')->name('trash_email_details');
        Route::get('/restore-all', 'restoreAll_emails')->name('restoreAll_emails');
        Route::get('/delete-all', 'deleteAll_emails')->name('deleteAll_emails');
    });

    //Coupon Route
    Route::group(['controller' => CouponController::class, 'prefix' => '/coupon'], function () {
        Route::get('/', 'coupon')->name('coupon');
        Route::get('/type', 'coupon_type')->name('coupon_type');
    });

    // Fail Route Return back to Home page
    Route::fallback(function () {
        return view('layouts.frontend.404.404');
    });

});
