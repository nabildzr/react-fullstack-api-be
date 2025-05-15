<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->name('user')->middleware('auth:sanctum');

Route::apiResource('posts', PostController::class);

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/profile/{id}', [UserController::class, 'update'])->name('profile');


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
