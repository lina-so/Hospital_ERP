<?php

namespace Modules\Service\Models\HospitalService;

use Illuminate\Database\Eloquent\Model;
use Modules\Hospital\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Hospital\Models\Department\DepartmentCategory;
// use Modules\Service\Database\Factories\HospitalService/HospitalServiceFactory;

class HospitalService extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];
    protected $table = 'hospital_services';

    protected $fillable = ['service_name', 'department_id', 'department_category_id',
     'price', 'description', 'category','status'];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function departmentCategory()
    {
        return $this->belongsTo(DepartmentCategory::class);
    }

    // protected static function newFactory(): HospitalService/HospitalServiceFactory
    // {
    //     // return HospitalService/HospitalServiceFactory::new();
    // }
}
