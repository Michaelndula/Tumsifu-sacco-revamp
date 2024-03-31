<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ForbiddenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\CheckRole;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'index'])
        ->middleware('can:access-dashboard,staff')
        ->name('staff.dashboard');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->middleware('can:access-dashboard,admin')
        ->name('admin.dashboard');

    Route::get('/user/dashboard', [UserController::class, 'index'])
        ->middleware('can:access-dashboard,user')
        ->name('user.dashboard');
});

Route::get('/forbidden', [ForbiddenController::class, 'index'])->name('forbidden');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
