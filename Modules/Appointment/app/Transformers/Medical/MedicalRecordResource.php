<?php

namespace Modules\Appointment\Transformers\Medical;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Hospital\Transformers\Doctor\DoctorResource;
use Modules\Appointment\Transformers\Visit\VisitResource;
use Modules\Appointment\Transformers\Patient\PatientResource;

class MedicalRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'patient' => new PatientResource($this->patient),
            'doctor' => new DoctorResource($this->doctor),
            'visit' => new VisitResource($this->visit),
            'diagnosis' => $this->diagnosis,
            'symptoms' => $this->symptoms,
            'allergy' => $this->allergy,
            'treatment' => $this->treatment,
            'notes' => $this->notes,
            'patient_service_id' => $this->patient_service_id,
            
        ];
    }
}
