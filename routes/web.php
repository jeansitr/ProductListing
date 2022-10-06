<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    route::get('home', function () {
        return view('home');
    });
});

Route::resource('products', ProductController::class);

Route::resource('sellers', SellerController::class);

Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::registerView(function () {
    return view('auth.register');
});

Fortify::requestPasswordResetLinkView(function () {
    return view('auth.passwords.email');
});

Fortify::resetPasswordView(function () {
    return view('auth.passwords.reset');
});
