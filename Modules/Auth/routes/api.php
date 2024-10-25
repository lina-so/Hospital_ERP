<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\AuthController;
use Modules\Auth\Http\Controllers\login\admin\AdminLoginController;
use Modules\Auth\Http\Controllers\login\doctor\DoctorLoginController;
use Modules\Auth\Http\Controllers\login\employee\EmployeeLoginController;


/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::controller(AdminLoginController::class)
    ->prefix('auth')
    ->group(function(){
        Route::middleware('guest:sanctum')
        ->group(function(){
            Route::post('admin/login','login')->name('login');

        });
    });


Route::controller(EmployeeLoginController::class)
->prefix('auth')
->group(function(){
    Route::middleware('guest:sanctum')
    ->group(function(){
        Route::post('employee/login','login')->name('login');

    });
});


Route::controller(DoctorLoginController::class)
->prefix('auth')
->group(function(){
    Route::middleware('guest:sanctum')
    ->group(function(){
        Route::post('doctor/login','login')->name('login');

    });
});
