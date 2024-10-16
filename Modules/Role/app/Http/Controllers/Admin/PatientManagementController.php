<?php

namespace Modules\Role\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Patient\Doctor;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Hospital\Http\Requests\Doctor\DoctorRequest;
use Modules\Appointment\Http\Requests\Patient\PatientRequest;

class PatientManagementController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return $this->apiSuccess($patients, 'patients fetched successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $validated = $request->validated();
        $patient = Patient::create($validated);
        return $this->apiSuccess($patient, 'patient added successfully',201);


    }

    /**
     * Show the specified resource.`
     */
    public function show(Patient $patient)
    {
        return $this->apiSuccess($patient, 'patient retrieved successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request,Patient $patient)
    {

        $validated = $request->validated();
        $patient->update($validated);
        return $this->apiSuccess($patient, 'patient updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return $this->apiSuccess($patient, 'patient deleted successfully',201);

    }
}
