<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [Auth\RegisteredUserController::class, 'store']);
    Route::get('login', [Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [Auth\AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [Auth\PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [Auth\NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [Auth\NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [Auth\EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [Auth\ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [Auth\ConfirmablePasswordController::class, 'store']);
    Route::put('password', [Auth\PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


Route::middleware('guest:admin')->group(function () {
    Route::controller(Dashboard\AdminAuthController::class)->prefix('admin')->as('admin.')->group(function () {
        Route::get('/', 'create')->name('login');
        Route::post('/', 'login')->name('login_post');
    });
});

Route::middleware('check_guard')->prefix('admin')->as('admin.')->group(function () {
    Route::post('logout', [Dashboard\AdminAuthController::class, 'destroy'])->name('logout');
});