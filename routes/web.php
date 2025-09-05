<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Catalog\CatalogController;
use App\Http\Controllers\Catalog\CatalogElementController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\MainPage\MainPageController;
use App\Http\Controllers\Review\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index'])->name('index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/landing', [LandingController::class, 'index'])->name('landing');

Route::prefix('catalog')->name('catalog.')->group(function () {
    Route::get('/', [CatalogController::class, 'index'])->name('index');
    Route::get('/{code}', [CatalogElementController::class, 'index'])->name('page');
});


Route::middleware(['log'/*, 'auth'*/])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboards');
    Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard')->whereNumber('id');
});

Route::middleware(['guest'])->prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::prefix('review')->name('review.')->group(function () {
    Route::post('/', [ReviewController::class, 'store'])->name('store');
});

Route::fallback(function () {
    return view('main.index');
});
