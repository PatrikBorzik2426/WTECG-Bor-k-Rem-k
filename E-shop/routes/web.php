<?php

use App\Http\Controllers\v1\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\UserController;

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

//! dd() - function for debbuging  in Laravel
//! ddd() - function for debbuging  in Laravel on deeper level

Route::get('/shop', [ProductController::class, 'index']); # This is the correct way to use controllers

Route::get('/', function () {
    return view('home');
});

//TODO Vymazať slúži iba na učenie

Route::get('/hello', function () {
    return response('Hello, World!', 200);
});

Route::get('/posts/{id}', function ($id) {
    return response('Hello, World ' . $id, 200);
})->where('id', '[0-9]+');;

Route::get('/search', function (Request $request) {
    dd($request->name);
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/submit-registration', [UserController::class, 'registration']);

Route::post('/submit-login', [UserController::class, 'login']);
