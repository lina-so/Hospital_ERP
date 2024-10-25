<?php

namespace Modules\Hospital\Http\Controllers\Discharge;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Hospital\Http\Requests\Discharge\DischargeRequest;

class DischargeController extends Controller
{
    use ResponseTrait;



    /**
     * Store a newly created resource in storage.
     */
    public function store(DischargeRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::findOrFail($data['patient_id']);
        $patient->update(['discharge_date'=>now()]);
        $patient->room->update(['status'=>'available']);
        return $this->apiSuccess($patient,'patient discharged successfully',200);

    }


}
