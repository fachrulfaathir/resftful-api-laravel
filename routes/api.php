<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// //posts
// Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);


Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');


Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// Menggunakan middleware auth:api untuk melindungi route posts
Route::middleware('auth:api')->apiResource('/posts', App\Http\Controllers\Api\PostController::class);


/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');