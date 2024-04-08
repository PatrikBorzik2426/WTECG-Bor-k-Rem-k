<?php

use App\Http\Controllers\v1\OrderController;
use App\Http\Controllers\v1\ParameterController;
use App\Http\Controllers\v1\ProductController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\CartItemController;
use App\Http\Controllers\v1\ShoppingSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1'], function () {

    Route::get('/search/products', [ProductController::class, 'searchUpProduct']);
    Route::get('/temporary_account',[UserController::class, 'temporaryAccount']);
});