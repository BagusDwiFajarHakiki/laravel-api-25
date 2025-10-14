<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/halo', function () {
    return 'halo, laravel!';
});

Route::get('/products', [ProductController::class, 'index']);
