<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Catalog\CatalogController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\MainPage\MainPageController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Catalog\ElementController;

Route::get('/', [MainPageController::class, 'index'])->name('index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/landing', [LandingController::class, 'index'])->name('landing');

Route::prefix('catalog')->name('catalog.')->group(function () {
    Route::get('/', [CatalogController::class, 'index'])->name('index');
    Route::get('/{code}', [ElementController::class, 'index'])->name('page');
});


Route::middleware(['log', 'auth:sanctum', 'auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/catalog', [AdminController::class, 'index'])->name('catalog');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboards');
    Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard')->whereNumber('id');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout'); // TODO сделать формой
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

Route::fallback(fn (): View => view('main.index'));
