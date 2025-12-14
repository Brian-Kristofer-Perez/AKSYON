<?php

use App\Http\Controllers\ReportController;
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

Route::get('/admin/login', [AuthController::class, 'adminLoginPage'])->name('admin.login');
Route::get('/user/login', [AuthController::class, 'userLoginPage'])->name('user.login');

// Post Routes (Auth)
Route::post('/admin/register', [AuthController::class, 'adminRegistration'])->name('admin.auth.register');
Route::post('/user/register', [AuthController::class, 'userRegistration'])->name('user.auth.register');

Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.auth.login');
Route::post('/user/login', [AuthController::class, 'userLogin'])->name('user.auth.login');


Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.auth.logout');
Route::post('/user/logout', [AuthController::class, 'userLogout'])->name('user.auth.logout');

Route::get('/map', function () {
    return view('map');
})->middleware('auth:web')->name('map.view');

Route::get('/my-reports', [ReportController::class, 'myReports'])->name('my.reports');

Route::get('/submit-report', [ReportController::class, 'submitReportsPage'])->name('submit.report');



// Route::get('/admin-dashboard', function () {
//     return view('admin-dashboard');
// });

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/landing', function () {
//     return view('landing');
// });

// Route::get('/map', function () {
//     return view('map');
// });

// Route::get('/my-reports', function () {
//     return view('my-reports');
// });

// Route::get('/submit-report', function () {
//     return view('submit-report');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });




?>