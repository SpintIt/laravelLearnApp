<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Catalog\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('v1')->name('api.v1.')->group(function() {
        Route::apiResource('products', ProductController::class);
    });
    /*Route::prefix('products')->name('api.products.')->group(function() {
        Route::apiResource('/', ProductController::class);
    });*/
});
