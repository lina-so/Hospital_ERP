<?php

namespace Modules\Appointment\Models\Record;

use Illuminate\Database\Eloquent\Model;
use Modules\Hospital\Models\Doctor\Doctor;
use Modules\Appointment\Models\Visit\Visit;
use Modules\Appointment\Models\Patient\Patient;
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
     'diagnosis', 'symptoms','allergy','treatment', 'notes','visit_id'];


     

     public function patient()
     {
         return $this->belongsTo(Patient::class);
     }

     public function doctor()
     {
         return $this->belongsTo(Doctor::class);
     }

     public function visit()
     {
         return $this->belongsTo(Visit::class);
     }

    // protected static function newFactory(): Record/MedicalRecordFactory
    // {
    //     // return Record/MedicalRecordFactory::new();
    // }
}
