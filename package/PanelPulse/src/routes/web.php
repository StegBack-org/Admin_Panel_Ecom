<?php

use Kartikey\PanelPulse\Http\Controllers\AjaxController;
use Kartikey\PanelPulse\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Kartikey\PanelPulse\Http\Controllers\AdminController;
use Kartikey\PanelPulse\Http\Controllers\AuthController;
use Kartikey\PanelPulse\Http\Controllers\OrderController;
use Kartikey\PanelPulse\Services\languageService;

$lang = (new languageService)->getRouteLocale();
define('lang', $lang);

Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});


Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('register', function () {
        return view('auth.login');
    })->name('register');

    Route::post('login', [AuthController::class, 'loggedIn_PostRequest'])->name('login');
});


Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::prefix('admin')->group(function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
        Route::get('/order/{order_id}', [OrderController::class, 'order'])->name('admin.order');

        //* Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');

        //* Shipping Settings
        Route::get('/settings/shipping', [SettingController::class, 'shippings'])->name('admin.settings.shipping');
        Route::get('/settings/shipping/{country}', [SettingController::class, 'shippings_rates'])->name('admin.settings.shipping.rates');
        Route::post('/settings/shipping/add', [SettingController::class, 'shipping_add'])->name('admin.settings.shipping.add');
        Route::post('/settings/shipping/add-country', [SettingController::class, 'shipping_add_country'])->name('admin.settings.shipping.add-country');
        Route::delete('/settings/shipping/country/delete', [SettingController::class, 'shipping_country_delete'])->name('admin.settings.shipping.country.delete');

        //? Done Taxation Settings
        Route::get('/settings/taxes', [SettingController::class, 'taxes'])->name('admin.settings.taxes');
        Route::get('/settings/taxes/{country}', [SettingController::class, 'taxes_detail'])->name('admin.settings.taxes.detail');
        Route::post('/settings/taxes/{country}', [SettingController::class, 'taxes_store'])->name('admin.settings.taxes.update');
        Route::get('/settings/taxes/delete/{country}', [SettingController::class, 'taxes_delete'])->name('admin.settings.taxes.update');

        //? Payment and method Setting
        Route::get('/settings/payments', [SettingController::class, 'payments'])->name('admin.settings.payments');
        Route::get('/settings/payments/methods', [SettingController::class, 'payments_method'])->name('admin.settings.payments.methods');
        Route::post('/settings/payments/methods/add', [SettingController::class, 'payments_method_add'])->name('admin.settings.payments.methods.add');
        Route::post('/settings/payments/methods/update', [SettingController::class, 'payments_method_update'])->name('admin.settings.payments.methods.update');
        Route::delete('/settings/payments/methods/delete', [SettingController::class, 'payments_method_delete'])->name('admin.settings.payments.methods.delete');
    });


    Route::post('getStateByCountry', [AjaxController::class, 'getStateByCountry'])->name('getStateByCountry');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});