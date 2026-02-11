<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('admin-core.admin_route_prefix'),
], function () {

    Route::get('/login', function () {
        return view('admin-core::auth.login');
    })->name('admin.login');

    Route::get('/dashboard', function () {
        return view('admin-core::dashboard');
    })->name('admin.dashboard');

});
