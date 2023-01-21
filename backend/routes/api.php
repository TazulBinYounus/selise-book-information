<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('books', [BookController::class, 'books']);
Route::get('me', [AuthController::class, 'me']);
Route::post('me', [AuthController::class, 'me']);


Route::group([
    'middleware' => 'api'
], function () {

    Route::get('books', [BookController::class, 'books']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('profile', [AuthController::class, 'profile']);
    Route::get('me', [AuthController::class, 'me']);
    Route::post('me', [AuthController::class, 'me']);
});
