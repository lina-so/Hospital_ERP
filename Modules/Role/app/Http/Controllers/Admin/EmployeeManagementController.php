<?php

namespace Modules\Role\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Staff\Models\Employee\Employee;
use Modules\Staff\Http\Requests\Employee\EmployeeRequest;
use Modules\Staff\Transformers\Employee\EmployeeResource;

class EmployeeManagementController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('job_title', 'asc')->get();
        return $this->apiSuccess(EmployeeResource::collection($employees), 'employees fetched successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
        $employee = Employee::create($validated);
        return $this->apiSuccess(new EmployeeResource($employee), 'employee added successfully',201);

    }

    /**
     * Show the specified resource.`
     */
    public function show(Employee $employee)
    {
        return $this->apiSuccess(new EmployeeResource($employee), 'employee retrieved successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request,Employee $employee)
    {

        $validated = $request->validated();
        $employee->update($validated);
        return $this->apiSuccess(new EmployeeResource($employee), 'employee updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return $this->apiSuccess(new EmployeeResource($employee), 'employee deleted successfully',201);

    }
}
