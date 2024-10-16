<?php

use Illuminate\Support\Facades\Route;
use Modules\Hospital\Http\Controllers\Room\RoomController;
use Modules\Hospital\Http\Controllers\Doctor\DoctorController;
use Modules\Hospital\Http\Controllers\Room\RoomCategoryController;
use Modules\Hospital\Http\Controllers\Department\DepartmentController;
use Modules\Hospital\Http\Controllers\Department\DepartmentCategoryController;

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

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('hospital', HospitalController::class)->names('hospital');
// });
Route::apiResource('room', RoomController::class)->names('room');
Route::apiResource('room-category', RoomCategoryController::class)->names('room-category');

Route::apiResource('department', DepartmentController::class)->names('department');
Route::apiResource('department-category', DepartmentCategoryController::class)->names('department-category');


//*////////////////////////// Doctor /////////////////////////////////////*//

Route::middleware('auth:doctor')->group(function () {
    // Route::post('/doctor/login', [DoctorController::class, 'login']);
});

