<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//active user account routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/activate/{code}', [App\Http\Controllers\ActivationController::class, 'activateUserAccount'])->name('user.activate');
Route::get('/resend/{email}', [App\Http\Controllers\ActivationController::class, 'resendActivationCode'])->name('code.resend');

//product routes
Route::get('/products/{product}', [App\Http\Controllers\HomeController::class, 'show'])->name('product.show');
Route::get('/products/category/{category}', [App\Http\Controllers\HomeController::class, 'GetProductByCategory'])->name('category.products');
Route::get('/product/search', [App\Http\Controllers\HomeController::class, 'SearchProduct'])->name('products.search');

//cart routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get('/add/cart/{product}', [App\Http\Controllers\CartController::class, 'addProductToCart'])->name('add.cart');
Route::put('/update/cart/{product}', [App\Http\Controllers\CartController::class, 'updateProductOnCart'])->name('update.cart');
Route::delete('/remove/{product}/cart', [App\Http\Controllers\CartController::class, 'removeProductFromCart'])->name('remove.cart');

//payment routes
Route::get('/handle-payment', [App\Http\Controllers\PaypalPaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('/cancel-payment', [App\Http\Controllers\PaypalPaymentController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('/payment-succes', [App\Http\Controllers\PaypalPaymentController::class, 'paymentSuccess'])->name('success.payment');

//user routes
Route::middleware(['auth'])->group(function () {
    Route::post('user/{user}', [UserController::class, 'update'])->name('user.update');
});

//admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'GetProducts'])->name('admin.prodcuts');
Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'GetOrders'])->name('admin.orders');

//dashboard products routes

Route::group(['middleware' => 'auth:admin', 'prefix' => 'dashboard'], function () {
    Route::resource('/products', App\Http\Controllers\ProductController::class);
    Route::resource('/orders', App\Http\Controllers\OrderController::class);
    Route::resource('/categories', App\Http\Controllers\CategoryController::class);
});
