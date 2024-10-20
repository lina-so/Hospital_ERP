<?php

use Illuminate\Support\Facades\Route;
use Modules\Role\Http\Controllers\Admin\DoctorManagementController;
use Modules\Role\Http\Controllers\Admin\PatientManagementController;
use Modules\Role\Http\Controllers\Admin\EmployeeManagementController;

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
//     Route::apiResource('role', RoleController::class)->names('role');
// });

Route::middleware('auth:admin')->group(function () {
    Route::apiResource('admin/doctor', DoctorManagementController::class)->names('doctor-management');
    Route::apiResource('admin/patient', PatientManagementController::class)->names('patient-management');
    Route::apiResource('admin/employee', EmployeeManagementController::class)->names('employee-management');


});

Route::middleware('auth:employee' ,'employee_type:receptionist')->group(function () {
    Route::apiResource('employee/patient', PatientManagementController::class)->names('patient-management');

});

// Route::middleware('auth:employee' ,'employee_type:nurse')->group(function () {
//     Route::apiResource('employee/medical-record', MedicalRecordController::class)->names('medical-record');

// });
