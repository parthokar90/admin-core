<?php

use Illuminate\Support\Facades\Route;

use ParthoKar\AdminCore\Http\Controllers\Auth\LoginController;

use ParthoKar\AdminCore\Http\Controllers\Admin\DashboardController;

use ParthoKar\AdminCore\Http\Controllers\Admin\RoleController;

use ParthoKar\AdminCore\Http\Controllers\Admin\PermissionController;

use ParthoKar\AdminCore\Http\Controllers\Admin\UserController;

Route::middleware('web')
    ->prefix(config('admin-core.admin_route_prefix'))
    ->name('admin.')
    ->group(function () {

        // Guest Routes
        Route::middleware('guest:admin')->group(function () {

            Route::get('/login', [LoginController::class, 'showLogin'])
                ->name('login');

            Route::post('/login', [LoginController::class, 'login'])
                ->name('login.submit');
        });

        // Authenticated Admin Routes
        Route::middleware('auth:admin')->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

            Route::post('/logout', [LoginController::class, 'logout'])
                ->name('logout');

            Route::resource('roles', RoleController::class);

            Route::resource('permissions', PermissionController::class);

            Route::resource('users', UserController::class);
            
        });
    });
