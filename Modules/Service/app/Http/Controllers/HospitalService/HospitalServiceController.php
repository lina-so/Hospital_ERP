<?php

namespace Modules\Service\Http\Controllers\HospitalService;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Service\Models\HospitalService\HospitalService;
use Modules\Service\Http\Requests\HospitalService\HospitalServiceRequest;

class HospitalServiceController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = HospitalService::all();
        return $this->apiSuccess($services, 'HospitalServices fetched successfully',200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(HospitalServiceRequest $request)
    {
        $validated = $request->validated();
        $service = HospitalService::create($validated);
        return $this->apiSuccess($service, 'HospitalService:'.$service->service_name.' added successfully',201);
    }

    /**
     * Show the specified resource.
     */
    public function show(HospitalService $service)
    {
        return $this->apiSuccess($service, 'HospitalService:'.$service->service_name.' retrieved successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HospitalServiceRequest $request,HospitalService $service)
    {

        $validated = $request->validated();
        $service->update($validated);
        return $this->apiSuccess($service, 'HospitalService:'.$service->service_name.' updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalService $service)
    {
        $service->delete();
        return $this->apiSuccess($service, 'HospitalService:'.$service->service_name.' deleted successfully',201);

    }
}
