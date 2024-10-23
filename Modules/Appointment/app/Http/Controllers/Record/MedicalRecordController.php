<?php

namespace Modules\Appointment\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Modules\Appointment\Models\Appointment\Appointment;
use Modules\Service\Models\PatientService\PatientService;
use Modules\Appointment\Transformers\Medical\MedicalRecordResource;
use Modules\Appointment\Http\Requests\Appointment\AppointmentRequest;
use Modules\Service\Http\Requests\PatientService\PatientServiceRequest;
use Modules\Appointment\Http\Requests\MedicalRecord\MedicalRecordRequest;

class MedicalRecordController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('appointment::index');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicalRecordRequest $m_request,AppointmentRequest $a_request,PatientServiceRequest $p_request)
    {
        return DB::transaction(function () use ($m_request, $a_request,$p_request) {
            $medical_request_validated = $m_request->validated();
            $appointment_request_validated = $a_request->validated();
            $patient_service_request_validated = $p_request->validated();

            $patient_service = PatientService::create($patient_service_request_validated);

            $medical_record = $patient_service->medical_record()->create($medical_request_validated);

            $appointment = Appointment::create($appointment_request_validated);

            return $this->apiSuccess(new MedicalRecordResource($medical_record), 'Patient data added to medical record successfully ', 201);
        });
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('appointment::show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
