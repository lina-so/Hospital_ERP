<?php

namespace Modules\Appointment\Models\Record;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Appointment\Database\Factories\Record/MedicalRecordFactory;

class MedicalRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'medical_records';

    protected $fillable = ['patient_id', 'doctor_id', 'patient_service_id',
     'diagnosis', 'treatment', 'notes'];


    // protected static function newFactory(): Record/MedicalRecordFactory
    // {
    //     // return Record/MedicalRecordFactory::new();
    // }
}
