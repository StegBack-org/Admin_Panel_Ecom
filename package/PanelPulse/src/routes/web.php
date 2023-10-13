<?php

use Kartikey\PanelPulse\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Kartikey\PanelPulse\Http\Controllers\AdminController;
use Kartikey\PanelPulse\Http\Controllers\AuthController;
use Kartikey\PanelPulse\Http\Controllers\OrderController;

// Define middleware groups outside of route definitions

// Middleware group for 'guest' (non-authenticated users)
Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('register', function () {
        return view('auth.login');
    })->name('register');

    Route::post('login', [AuthController::class, 'loggedIn_PostRequest'])->name('login');
});

// Middleware group for 'auth' (authenticated users)
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::prefix('admin')->group(function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
        Route::get('/order/{order_id}', [OrderController::class, 'order'])->name('admin.order');

        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
        Route::get('/settings/shipping', [SettingController::class, 'shippings'])->name('admin.settings.shipping');
        Route::get('/settings/taxes', [SettingController::class, 'taxes'])->name('admin.settings.taxes');
        Route::get('/settings/payments', [SettingController::class, 'payments'])->name('admin.settings.payments');
        Route::get('/settings/payments/methods', [SettingController::class, 'payments_method'])->name('admin.settings.payments.methods');
        Route::post('/settings/payments/methods/add', [SettingController::class, 'payments_method_add'])->name('admin.settings.payments.methods.add');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
