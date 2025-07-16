<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('locale/{locale}', 'locale')->name('locale')->where('locale', '[a-z]+');
    });

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{slug}', 'show')->name('show')->where('slug', '[A-Za-z0-9\-]+');
    });


Route::get('', [HomeController::class, 'index'])->name('home');

Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('products/{slug}', [ProductController::class, 'show'])->name('products')->where('slug', '[A-Za-z0-9\-]+');