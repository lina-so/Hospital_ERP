<?php

namespace Modules\Appointment\Transformers\Visit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Hospital\Transformers\Doctor\DoctorResource;
use Modules\Appointment\Transformers\Patient\PatientResource;

class VisitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
       return [
        'patient' => new PatientResource($this->whenLoaded('patient')),
        'doctor' => new DoctorResource($this->whenLoaded('doctor')),
        'visit_date' => $this->visit_date,

       ];
    }
}
