<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/brand', function () {
    return view('brand');
})->name('brand');

// products route
Route::resource('products', ProductController::class);
// Route::get('/product', [ProductController::class, 'index'])->name('product');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');