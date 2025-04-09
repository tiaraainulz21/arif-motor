<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustommerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/masuk', [AuthController::class, 'showLoginForm'])->name('masuk');
Route::post('/masuk', [AuthController::class, 'masuk']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Protected Routes
Route::middleware('auth')->group(function () {
    Route::resource('/dashboard', CustommerController::class);
});
