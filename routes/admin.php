<?php

use Illuminate\Support\Facades\Route;

use ParthoKar\AdminCore\Http\Controllers\Auth\LoginController;

Route::prefix(config('admin-core.admin_route_prefix'))->group(function () {

    Route::get('/login', [LoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin-core::dashboard');
        })->name('admin.dashboard');

        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    });
});
