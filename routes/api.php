<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:employee')->group(function () {
    // Route::apiResource('employee/patient', PatientManagementController::class)->names('doctor-management');

});
