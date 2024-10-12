<?php

namespace Modules\Service\Models\PatientService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Service\Database\Factories\PatientService/PatientServiceFactory;

class PatientService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'patient_services';

    protected $fillable = ['patient_id', 'hospital_service_id', 'status', 'requested_by', 'date_requested'];


    // protected static function newFactory(): PatientService/PatientServiceFactory
    // {
    //     // return PatientService/PatientServiceFactory::new();
    // }
}
