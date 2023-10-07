<?php

use Illuminate\Support\Facades\Route;


Route::get('admin', function () {
    return view('PanelPulse::admin.home');
});

Route::get('/login', [AuthController::class, 'login'])->name('admin-login');
