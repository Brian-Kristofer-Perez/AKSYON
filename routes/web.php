<?php

use App\Http\Controllers\ReportController;
use App\Services\ReportService;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;

// Landing Page Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Home Route (Protected by auth middleware)
Route::get('/home', function () {

    $service = new ReportService();
    $reports = $service->getAll();

    return view("home", ['reports' => $reports]);
})
    ->name('home')
    ->middleware('auth:web,admin');


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

    $service = new ReportService();
    $reports = $service->getAll();
    return view('map', ['mapMarkers' => $reports]);

})->middleware('auth:web,admin')->name('map.view');

Route::get('/my-reports', [ReportController::class, 'myReports'])->name('my.reports')->middleware('auth:web');
Route::get('/submit-report', [ReportController::class, 'submitReportsPage'])->name('submit.report')->middleware('auth:web');
Route::post('/reports', [ReportController::class, 'submitReport'])->middleware('auth:web')->name('submit.report.post');

Route::get('/admin/dashboard', function () {

    $service = new ReportService();
    $reports = $service->getAll();

    return view('admin-dashboard', ['reports' => $reports]);
})->middleware('auth:admin')->name('admin.dashboard');


Route::post('/reports/update', [ReportController::class, 'addUpdate'])
    ->middleware('auth:admin')
    ->name('report.update');

Route::delete('/reports', [ReportController::class, 'deleteReport'])
    ->middleware('auth:admin')
    ->name('report.delete');

?>