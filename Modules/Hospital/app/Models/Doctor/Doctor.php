<?php

namespace Modules\Hospital\Models\Doctor;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\Appointment\Models\Patient\Patient;
use Modules\Hospital\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Hospital\Database\Factories\DoctorFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'doctors';

    protected $fillable = ['first_name', 'last_name', 'phone_number',
    'specialty_id', 'department_id', 'department_category_id','email','password'];

    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    protected static function newFactory()
    {
        return DoctorFactory::new();
    }
}
