<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\WaitersController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [WaitersController::class, 'index'])->name('home');


Route::get('/products', [ProductsController::class, 'index'])->name('products.list');
Route::get('/product/edit/{id}', [ProductsController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductsController::class, 'update'])->name('product.update');

Route::get('/tables', [TablesController::class, 'index'])->name('tables.list');