<?php

namespace Modules\Appointment\Models\Visit;

use Illuminate\Database\Eloquent\Model;
use Modules\Hospital\Models\Doctor\Doctor;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Appointment\Models\Record\MedicalRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Appointment\Database\Factories\Visit\VisitFactory;

class Visit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
    'patient_id',
    'department_id',
    'doctor_id',
    'visit_reason',
    'visit_date',
    'room_id',
    'status'
    ];

    protected $with = ['patient','doctor'];

    protected function casts(): array
    {
        return [
           'visit_date' => 'date:Y-m-d',
        ];
    }
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // protected static function newFactory(): Visit\VisitFactory
    // {
    //     // return Visit\VisitFactory::new();
    // }
}
