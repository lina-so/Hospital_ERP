<?php

namespace Modules\Staff\Transformers\Employee;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'department_id' => $this->department->id,
            'department' => $this->department->name,
            "job_title"=>$this->job_title,
            "hire_date"=>$this->hire_date,
            "salary"=>$this->salary,
            "employment_status"=>$this->employment_status,
            "gender"=>$this->gender,

        ];
    }
}
