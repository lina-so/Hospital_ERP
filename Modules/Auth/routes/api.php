<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\AuthController;


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

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function(){
        Route::middleware('guest:sanctum')
        ->group(function(){
            Route::post('admin/login','login')->name('login');
        });

    });
