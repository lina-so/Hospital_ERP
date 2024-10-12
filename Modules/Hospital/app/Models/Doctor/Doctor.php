<?php

namespace Modules\Hospital\Models\Doctor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Hospital\Database\Factories\Doctor/DoctorFactory;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'doctors';

    protected $fillable = ['first_name', 'last_name', 'specialization', 'phone_number',
    'specialty_id', 'department_id', 'department_category_id'];


    // protected static function newFactory(): Doctor/DoctorFactory
    // {
    //     // return Doctor/DoctorFactory::new();
    // }
}
