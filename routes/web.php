<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WaitersController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [WaitersController::class, 'index'])->name('home');


Route::get('/products', [ProductsController::class, 'index'])->name('products.list');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
