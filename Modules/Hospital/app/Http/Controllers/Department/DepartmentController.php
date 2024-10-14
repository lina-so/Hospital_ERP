<?php

namespace Modules\Hospital\Http\Controllers\Department;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Department\Department;
use Modules\Hospital\Http\Requests\Department\DepartmentRequest;

class DepartmentController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = collect();

        Department::chunk(100, function ($depChunk) use ($departments) {
            foreach ($depChunk as $dep) {
                $departments->push($dep);
            }
        });
        return $this->apiSuccess($departments, 'departments retrieved successfully',200);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $validated = $request->validated();
        $department = Department::create($validated);
        return $this->apiSuccess($department, 'department added successfully',201);


    }

    /**
     * Show the specified resource.
     */
    public function show(Department $department)
    {
        return $this->apiSuccess($department, 'department details successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request,Department $department)
    {
        $validated = $request->validated();
        $department->update($validated);
        return $this->apiSuccess($department, 'department updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return $this->apiSuccess($department, 'department deleted successfully',201);

    }
}
