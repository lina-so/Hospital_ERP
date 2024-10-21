<?php

namespace Modules\Hospital\Listeners\Doctor;

use Illuminate\Queue\InteractsWithQueue;
use Modules\Hospital\Models\Doctor\Doctor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Hospital\Events\Doctor\NotifyDoctorOfNewPatientEvent;
use Modules\Hospital\Notifications\Doctor\NotifyDoctorOfNewPatient;

class NotifyDoctorOfNewPatientListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NotifyDoctorOfNewPatientEvent $event): void
    {
        $doctor_id = $event->doctor;
        $visit = $event->visit;
        $room_number = $event->room_number;
        $doctor = Doctor::where('id',$doctor_id)->first();
// dd($doctor);
        $doctor->notify(new NotifyDoctorOfNewPatient($visit,$room_number));
    }

}
