<?php

namespace Modules\Staff\Models\Employee;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
// use Modules\Staff\Database\Factories\Employee/EmpolyeeFactory;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];
    protected $table = 'employees';

    protected $fillable = ['first_name', 'last_name', 'job_title',
    'department_id', 'hire_date', 'salary', 'phone_number', 'employment_status','gender','email','password'];

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

    // protected static function newFactory(): Employee/EmpolyeeFactory
    // {
    //     // return Employee/EmpolyeeFactory::new();
    // }
}
