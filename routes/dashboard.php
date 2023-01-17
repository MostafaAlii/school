<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
	    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('dashboard', [Dashboard\DashboardController::class, 'index'])->name('dashboard');
    });

    // Employee routes ::
    Route::prefix('employee')->middleware('auth:employee')->as('employee.')->group(function () {
        Route::get('dashboard', [Auth\EmployeeAuthController::class, 'employee_dashboard'])->name('dashboard');
    });

    require __DIR__.'/auth.php';
});