<?php

namespace Modules\Service\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'service_name' => $this->service_name,
            'department' => $this->department->name,
            'department_category' => $this->departmentCategory->name,
            'price' => $this->price,
            'status' => $this->status,
            'category' => $this->category,
        ];
    }
}
