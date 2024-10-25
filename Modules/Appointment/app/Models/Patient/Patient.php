<?php

namespace Modules\Appointment\Models\Patient;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Modules\Hospital\Models\Room\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\Appointment\Models\Visit\Visit;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Modules\Appointment\Models\Record\MedicalRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Appointment\Database\Factories\Patient/PatientFactory;

class Patient extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'patients';

    protected $fillable = ['sequence_number', 'first_name', 'last_name',
     'date_of_birth', 'age', 'gender', 'phone_number', 'address',
     'admission_date', 'discharge_date','ID_number','room_id'];

     protected function casts(): array
     {
         return [
            'date_of_birth' => 'date:Y-m-d',
            'admission_date' => 'date:Y-m-d',
            'discharge_date' => 'date:Y-m-d',
         ];
     }
     public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


     public function visits()
     {
        return $this->hasMany(Visit::class);
     }

     public function room()
     {
         return $this->belongsTo(Room::class);
     }


    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    // protected static function newFactory(): Patient/PatientFactory
    // {
    //     // return Patient/PatientFactory::new();
    // }
}
