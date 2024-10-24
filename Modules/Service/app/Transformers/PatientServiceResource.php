<?php

namespace Modules\Service\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Appointment\Transformers\Patient\PatientResource;

class PatientServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'patient' => new PatientResource($this->whenLoaded('patient')),
            'hospital_service' => $this->hospitalService->service_name,
            'category' => $this->category,
            'service_type' => $this->service_type,
        ];
    }
}
