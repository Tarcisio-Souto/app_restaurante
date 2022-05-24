<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WaitersController;
use Illuminate\Support\Facades\Route;

Route::get('/waiter/home', [WaitersController::class, 'index'])->name('home');
