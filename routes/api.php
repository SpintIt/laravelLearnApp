<?php

use App\Http\Controllers\Catalog\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('log'/*'auth:sanctum'*/)->group(function() {
    Route::prefix('products')->name('api.products.')->group(function() {
        Route::apiResource('/', ProductController::class);
    });
});
