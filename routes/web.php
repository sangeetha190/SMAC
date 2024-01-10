<?php

use App\Http\Controllers\AdminDashboard\AdminController;
use App\Http\Controllers\AlignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CancelOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTagController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippingPriceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/clear-cache', function () {
    $clearcache = Artisan::call('optimize:clear');
    echo "cache cleared<br>";
});

//Clear config cache:
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cache has been cleared';
});

// Clear view cache:
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});

// Link Storage:
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Link Created';
});

Route::get('/shop/{shop_url}', [FilterController::class, 'shopUrl'])->name('shop.url');



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-store', [HomeController::class, 'storeContact'])->name('store.contact');

Route::get('/user-login', [HomeController::class, 'login'])->name('user.login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/terms-and-conditions', [HomeController::class, 'termsCondition'])->name('terms.conditions');
Route::get('/privacy-and-policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/my-account', [HomeController::class, 'myAccount'])->middleware('customer')->name('my.account');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/wishlist', [HomeController::class, 'wishList'])->name('wishlist');

Route::get('/return-and-refund-policy', [HomeController::class, 'returnRefund'])->name('return.refund');
Route::get('/shipping-and-delivery-policy', [HomeController::class, 'shippingDelivery'])->name('shipping.delivery');


Route::get('/shop/product-category/{slug}', [HomeController::class, 'productCategory'])->name('product.category');

Route::get('shop/{slug1}/{slug2}', [HomeController::class, 'productDetails'])->name('product.details');

Route::post('/store-review', [HomeController::class, 'storeReview'])->name('store.review');
Route::post('/store-address', [HomeController::class, 'storeAddress'])->name('store.address');

Route::post('/create-address', [HomeController::class, 'createAddress'])->name('create.address');


Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change.password');

Route::post('/store-cancel-request', [CancelOrderController::class, 'cancelRequest'])->name('store.cancel.request');





Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('add-cart', [CartController::class, 'addCart'])->name('add.cart');
Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('remove-cart/{id}', [CartController::class, 'deleteCart'])->name('remove.cart');

Route::get('add-to-wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('add.to.wishlist');
// Route::post('update-wishlist', [CartController::class, 'update'])->name('update.wishlist');
Route::get('remove-from-wishlist/{id}', [WishlistController::class, 'remove'])->name('remove.from.wishlist');



// Route::get('paysuccess', [RazorpayController::class, 'store']);
Route::get('paysuccess', [RazorpayController::class, 'store'])->name('razorpay.payment.store');
Route::post('cash-on-delivery', [RazorpayController::class, 'cod'])->name('cash.on.delivery');
Route::get('order-success', [RazorpayController::class, 'orderSuccess'])->name('order.success');








Route::get('/admin-dashboard', [AdminController::class, 'index'])->middleware('admin')->name('admin.dashboard');

/* START User Management */
Route::resource('roles', RoleController::class)->middleware('admin');
Route::resource('users', UserController::class)->middleware('admin');

Route::get('all-customer', [UserController::class, 'allCustomer'])->name('all.customer');
Route::get('edit-customer/{slug}', [UserController::class, 'editCustomer'])->name('edit.customer');
Route::post('update-customer/{slug}', [UserController::class, 'updateCustomer'])->name('update.customer');


Route::resource('permissions', PermissionController::class)->middleware('admin');
/* END User Management */

/* START Product Management */
Route::resource('product-category', ProductCategoryController::class)->middleware('admin');
Route::resource('product-type', ProductTypeController::class)->middleware('admin');
Route::resource('product-tag', ProductTagController::class)->middleware('admin');
Route::resource('alignment', AlignmentController::class)->middleware('admin');
Route::resource('product', ProductController::class)->middleware('admin');

Route::get('product-search', [ProductController::class, 'productFilter'])->middleware('admin')->name('product.filter');
/* END Product Management */

/* START Order Management */
Route::resource('shipping-price-details', ShippingPriceController::class)->middleware('admin');
Route::resource('orders', OrderController::class)->middleware('admin');

Route::get('orders-search', [OrderController::class, 'orderSearch'])->middleware('admin')->name('order.search');


Route::post('update-order-status', [CancelOrderController::class, 'updateOrderStatus'])->name('update.order.status')->middleware('admin');
Route::post('order-cancel', [CancelOrderController::class, 'orderCancel'])->name('order.cancel')->middleware('admin');

Route::get('view-cancel-request-orders', [CancelOrderController::class, 'allCancelRequest'])->name('cancel.request.orders')->middleware('admin');

Route::get('cancelled-orders', [CancelOrderController::class, 'cancelledOrders'])->name('cancelled.orders')->middleware('admin');

// Route::resource('product-tag', ProductTagController::class)->middleware('admin');
// Route::resource('alignment', AlignmentController::class)->middleware('admin');
// Route::resource('product', ProductController::class)->middleware('admin');
/* END Order Management */

/* START Login Management */
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('login.register');
Route::post('/login-validate', [AuthController::class, 'postLogin'])->name('login');
Route::post('/user-register', [AuthController::class, 'postRegistration'])->name('customer.register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
/* END Login Management */


Route::get('/search', [HomeController::class, 'search'])->name('product.search');
// Route::get('/search-results', [HomeController::class, 'searchResults'])->name('product.search.results');


// Route::get('/search', 'ProductController@search')->name('product.search');
// Route::get('/search-results', 'ProductController@searchResults')->name('product.search.results');

Route::get('/advance-search', [HomeController::class, 'advanceSearch'])->name('advance.search');
Route::get('/advance-search-page', [HomeController::class, 'advanceSearchPage'])->name('advance.search.page');
