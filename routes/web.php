<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::resource('/products', 'App\Http\Controllers\ProductController');
Route::get('/products/category/{category}', [App\Http\Controllers\HomeController::class, 'GetProductByCategory'])->name('category.products');
Route::get('/product/search', [App\Http\Controllers\HomeController::class, 'SearchProduct'])->name('products.search');

//cart routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get('/add/cart/{product}', [App\Http\Controllers\CartController::class, 'addProductToCart'])->name('add.cart');
Route::put('/update/cart/{product}', [App\Http\Controllers\CartController::class, 'updateProductOnCart'])->name('update.cart');
Route::delete('/remove/{product}/cart', [App\Http\Controllers\CartController::class, 'removeProductFromCart'])->name('remove.cart');
