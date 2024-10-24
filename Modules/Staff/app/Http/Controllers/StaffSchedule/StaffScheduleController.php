<?php

namespace Modules\Staff\Http\Controllers\StaffSchedule;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Doctor\Doctor;
use Modules\Staff\Models\Employee\Employee;
use Modules\Staff\Models\StaffSchedule\StaffSchedule;
use Modules\Service\Transformers\StaffScheduleResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Staff\Http\Requests\Shedule\StaffScheduleRequest;

class StaffScheduleController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('staff::index');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffScheduleRequest $request)
    {
        $data = $request->validated();
        $days = $data['days'];
        $time_id = $data['time_id'];

        if($request->type == 'doctor')
        {
            $employee = Doctor::where('email',$request->email)->first();
        }
        else if($request->type == 'employee')
        {
            $employee = Employee::where('email',$request->email)->first();
        }

        $schedule = StaffSchedule::create([
            'employeeable_type'=>$employee ? get_class($employee) : throw new ModelNotFoundException('Employee with the given email was not found.'),
            'employeeable_id'=>$employee?  $employee->id : throw new ModelNotFoundException('Employee with the given email was not found.'),
            'time_id'=> $time_id,
        ]);

        $schedule->days()->attach($days);

        return $this->apiSuccess(new StaffScheduleResource($schedule), 'schedule added successfully',201);


    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('staff::show');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
