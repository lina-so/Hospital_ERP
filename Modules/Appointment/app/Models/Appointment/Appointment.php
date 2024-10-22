<?php

namespace Modules\Appointment\Models\Appointment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Appointment\Database\Factories\Appointment/AppointmentFactory;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'appointments';

    protected $fillable = ['patient_id', 'hospital_service_id', 'appointment_date',
    'status'];



    // protected static function newFactory(): Appointment/AppointmentFactory
    // {
    //     // return Appointment/AppointmentFactory::new();
    // }
}
