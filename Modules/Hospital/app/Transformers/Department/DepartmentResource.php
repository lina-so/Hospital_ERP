<?php

namespace Modules\Hospital\Transformers\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
           'id' => $this->id,
            'department_category_id' => $this->departmentCategory->id,
            'department_category' => $this->departmentCategory->name,
            'name' => $this->name,
            'description'=>$this->description,

        ];
    }
}
