<?php

namespace Modules\Role\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Room\Room;
use Modules\Appointment\Models\Visit\Visit;
use Modules\Hospital\Models\Patient\Doctor;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Hospital\Http\Requests\Doctor\DoctorRequest;
use Modules\Appointment\Http\Requests\Visit\VisitRequest;
use Modules\Appointment\Http\Requests\Patient\PatientRequest;
use Modules\Hospital\Events\Doctor\NotifyDoctorOfNewPatientEvent;

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

    public function store(PatientRequest $request, VisitRequest $v_request)
    {
        return DB::transaction(function () use ($request, $v_request) {
            $validated_data = $request->validated();
            $visit_request_validated = $v_request->validated();

            \Log::info('Starting transaction...');
            $patient = Patient::firstOrCreate(
                [
                    'ID_number' => $request->input('ID_number')
                ],
                $validated_data
            );
            \Log::info('Patient created.');

            $room = Room::where('id', $visit_request_validated['room_id'])
                        ->where('status', 'available')
                        ->first();
            if (!$room) {
                return response()->json(['error' => 'Room not found or occupied'], 400);
            }
            \Log::info('Room query completed.');

            $visit = $patient->visits()->create($visit_request_validated);
            \Log::info('Visit created.');

            $room->update(['status'=>'occupied']);
            $doctor_id = $visit_request_validated['doctor_id'];

            event(new NotifyDoctorOfNewPatientEvent($doctor_id,$visit,$room->room_number));
            \Log::info('Event dispatched.');

            return $this->apiSuccess($patient, 'Patient added successfully', 201);
        });
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
