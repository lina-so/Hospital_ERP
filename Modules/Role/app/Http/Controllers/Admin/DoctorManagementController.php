<?php

namespace Modules\Role\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Doctor\Doctor;
use Modules\Hospital\Http\Requests\Doctor\DoctorRequest;
use Modules\Hospital\Transformers\Doctor\DoctorResource;

class DoctorManagementController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return $this->apiSuccess(DoctorResource::collection($doctors), 'doctors fetched successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        $validated = $request->validated();
        $doctor = Doctor::create($validated);

        return $this->apiSuccess(new DoctorResource($doctor), 'doctor added successfully',201);


    }

    /**
     * Show the specified resource.`
     */
    public function show(Doctor $doctor)
    {
        return $this->apiSuccess(new DoctorResource($doctor), 'doctor retrieved successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request,Doctor $doctor)
    {

        $validated = $request->validated();
        $doctor->update($validated);
        return $this->apiSuccess(new DoctorResource($doctor), 'doctor updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return $this->apiSuccess(new DoctorResource($doctor), 'doctor deleted successfully',201);

    }
}
