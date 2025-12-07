<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;

// Landing Page Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Home Route (Protected by auth middleware)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth:web');


// Auth pages
Route::get('/admin/register', [AuthController::class, 'adminRegistrationPage'])->name('admin.register');
Route::get('/user/register', [AuthController::class, 'userRegistrationPage'])->name('user.register');

Route::get('/admin/login', [AuthController::class, 'adminRegistrationPage'])->name('admin.login');
Route::get('/user/login', [AuthController::class, 'userRegistrationPage'])->name('user.login');

// Post Routes (Auth)
Route::post('/admin/register', [AuthController::class, 'adminRegistration'])->name('admin.auth.register');
Route::post('/user/register', [AuthController::class, 'userRegistration'])->name('user.auth.register');

Route::post('/admin/login', [AuthController::class, 'adminRegistration'])->name('admin.auth.login');
Route::post('/user/login', [AuthController::class, 'userRegistration'])->name('user.auth.login');

?>