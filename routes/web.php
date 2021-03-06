<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware(['redirect.checkout']);
    Route::post('/pay', [CartController::class, 'pay'])->name('cart.pay');
});

Auth::routes();
