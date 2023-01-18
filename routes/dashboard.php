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
    Route::middleware('check_guard')->prefix('admin')->group(function () {
        Route::get('dashboard', [Dashboard\DashboardController::class, 'index'])->name('admin.dashboard');
    });
    require __DIR__.'/auth.php';
});