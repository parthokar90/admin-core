<?php

use Illuminate\Support\Facades\Route;

use ParthoKar\AdminCore\Http\Controllers\Auth\LoginController;
use ParthoKar\AdminCore\Http\Controllers\Admin\DashboardController;
use ParthoKar\AdminCore\Http\Controllers\Admin\RoleController;
use ParthoKar\AdminCore\Http\Controllers\Admin\PermissionController;
use ParthoKar\AdminCore\Http\Controllers\Admin\UserController;

Route::prefix(config('admin-core.admin_route_prefix'))
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Guest Admin Routes
        |--------------------------------------------------------------------------
        */
        Route::middleware(['web', 'guest:admin'])->group(function () {

            Route::get('/login', [LoginController::class, 'showLogin'])
                ->name('login');

            Route::post('/login', [LoginController::class, 'login'])
                ->name('login.submit');
        });

        /*
        |--------------------------------------------------------------------------
        | Authenticated Admin Routes
        |--------------------------------------------------------------------------
        */
        Route::middleware(['web', 'auth:admin'])->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

            Route::post('/logout', [LoginController::class, 'logout'])
                ->name('logout');

            // Protected by permission middleware
            Route::resource('roles', RoleController::class)
                ->middleware('permission:manage-roles');

            Route::resource('permissions', PermissionController::class)
                ->middleware('permission:manage-permissions');

            Route::resource('users', UserController::class)
                ->middleware('permission:manage-users');
        });
    });
