<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/halo', function () {
        return 'Halo, Laravel';
    });
    
    Route::resource('vendors', VendorController::class);
    Route::resource('products', ProductController::class);
});
