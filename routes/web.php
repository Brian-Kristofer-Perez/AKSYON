<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;

// Landing Page Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Auth Routes
Auth::routes();

// Home Route (Protected by auth middleware)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth:web');


Route::get('/admin/register', [AuthController::class, 'adminRegistrationPage'])->name('admin.register');
Route::get('/user/register', [AuthController::class, 'userRegistrationPage']);

Route::get('/admin/login', [AuthController::class, 'adminRegistrationPage'])->name('admin.login');
Route::get('/user/login', [AuthController::class, 'userRegistrationPage'])->name('user.login');


?>