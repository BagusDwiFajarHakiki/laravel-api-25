<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/halo', function () {
    return 'Halo, Laravel';
});

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

Route::resource('vendors', VendorController::class);