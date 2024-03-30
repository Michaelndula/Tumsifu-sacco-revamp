<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//Auth routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        // Admin routes
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    });

    Route::middleware(['role:hr'])->group(function () {
        // HR routes
        Route::get('/hr/dashboard', [HRController::class, 'dashboard']);
    });

    Route::middleware(['role:user'])->group(function () {
        // User routes
        Route::get('/user/dashboard', [UserController::class, 'dashboard']);
    });
});
