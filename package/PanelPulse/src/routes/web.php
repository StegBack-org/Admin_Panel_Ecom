<?php

use Illuminate\Support\Facades\Route;
use Kartikey\PanelPulse\Http\Controllers\AdminController;
use Kartikey\PanelPulse\Http\Controllers\AuthController;


Route::middleware(['web'])->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('login', function () {
            return view('auth.login');
        })->name('login');

        Route::get('register', function () {
            return view('auth.login');
        })->name('register');

        Route::post('login', [AuthController::class, 'loggedIn_PostRequest'])->name('login');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
