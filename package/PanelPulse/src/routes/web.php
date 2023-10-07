<?php

use Illuminate\Support\Facades\Route;
use Kartikey\PanelPulse\Http\Controllers\AdminController;

Route::get('admin', [AdminController::class, 'index']);

// Route::get('admin', function () {
//     return view('PanelPulse::admin.home');
// });

// Route::get('/login', [AuthController::class, 'login'])->name('admin-login');
Route::get('login', function () {
    return "Login Page";
})->name('admin-login');
