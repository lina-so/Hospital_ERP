<?php

namespace Modules\Appointment\Models\Patient;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Appointment\Database\Factories\Patient/PatientFactory;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'patients';

    protected $fillable = ['sequence_number', 'first_name', 'last_name',
     'date_of_birth', 'age', 'gender', 'phone_number', 'address', 'allergies',
     'admission_date', 'discharge_date'];


    // protected static function newFactory(): Patient/PatientFactory
    // {
    //     // return Patient/PatientFactory::new();
    // }
}
