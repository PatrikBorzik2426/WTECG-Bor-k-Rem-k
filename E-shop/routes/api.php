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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//TODO Vymazať slúži iba na učenie
Route::get('/posts',function(){
   return response()->json([
       'title' => 'My first post',
       'content' => 'This is my first post'
   ]); 
});


//? api/v1/customers
//? Using groups

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('parameters', ParameterController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('shopping_sessions', ShoppingSessionController::class);
    Route::apiResource('cart-itmes', CartItemController::class);
});