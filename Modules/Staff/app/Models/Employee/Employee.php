<?php

namespace Modules\Staff\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Staff\Database\Factories\Employee/EmpolyeeFactory;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];
    protected $table = 'employees';

    protected $fillable = ['first_name', 'last_name', 'job_title', 'department_id', 'hire_date', 'salary', 'phone_number', 'employment_status'];


    // protected static function newFactory(): Employee/EmpolyeeFactory
    // {
    //     // return Employee/EmpolyeeFactory::new();
    // }
}
