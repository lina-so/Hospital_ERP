<?php

namespace Modules\Hospital\Http\Controllers\Department;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Department\DepartmentCategory;
use Modules\Hospital\Http\Requests\Department\DepartmentCategoryRequest;

class DepartmentCategoryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentCategories = DepartmentCategory::all();
        return $this->apiSuccess($departmentCategories, 'departmentCategories fetched successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentCategoryRequest $request)
    {
        $validated = $request->validated();
        $department = DepartmentCategory::create($validated);
        return $this->apiSuccess($department, 'department_category added successfully',201);


    }

    /**
     * Show the specified resource.
     */
    public function show(DepartmentCategory $department_category)
    {
        return $this->apiSuccess($department_category, 'department_category retrieved successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentCategoryRequest $request,DepartmentCategory $department_category)
    {

        $validated = $request->validated();
        $department_category->update($validated);
        return $this->apiSuccess($department_category, 'department_category updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepartmentCategory $department_category)
    {
        $department_category->delete();
        return $this->apiSuccess($department_category, 'department_category deleted successfully',201);

    }
}

