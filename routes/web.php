<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

// Landing Page Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Auth Routes
Auth::routes();

// Home Route (Protected by auth middleware)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
