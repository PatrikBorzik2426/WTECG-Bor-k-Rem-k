<?php

use App\Http\Controllers\v1\ProductController;
use App\Http\Controllers\v1\ShoppingSessionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\UserController;
use Illuminate\Routing\Router;

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


Route::get('/shop', [ProductController::class, 'index'])->name('shop'); # This is the correct way to use controllers

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/posts/{id}', function ($id) {
    return response('Hello, World ' . $id, 200);
})->where('id', '[0-9]+');;

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/login-submit', [UserController::class, 'login']);

Route::post('/registration-submit', [UserController::class, 'registration']);

Route::get('/single-page/{id}', [ProductController::class, 'singlePage']);

Route::get('/cart', [ShoppingSessionController::class, 'cart']);

Route::get('/temporary_account',[UserController::class, 'temporaryAccount']);