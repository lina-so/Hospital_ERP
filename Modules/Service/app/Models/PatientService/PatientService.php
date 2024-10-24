<?php

namespace Modules\Service\Models\PatientService;

use Illuminate\Database\Eloquent\Model;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Appointment\Models\Record\MedicalRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Models\HospitalService\HospitalService;
// use Modules\Service\Database\Factories\PatientService/PatientServiceFactory;

class PatientService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = ['medical_record','patient'];

    protected $table = 'patient_services';

    protected $fillable = ['patient_id', 'hospital_service_id', 'status',
    'requested_by', 'date_requested','service_type'];


    public function medical_record()
    {
        return $this->hasOne(MedicalRecord::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function hospitalService()
    {
        return $this->belongsTo(HospitalService::class);
    }
    // protected static function newFactory(): PatientService/PatientServiceFactory
    // {
    //     // return PatientService/PatientServiceFactory::new();
    // }
}
