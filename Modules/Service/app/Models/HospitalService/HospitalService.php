<?php

namespace Modules\Service\Models\HospitalService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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


    // protected static function newFactory(): HospitalService/HospitalServiceFactory
    // {
    //     // return HospitalService/HospitalServiceFactory::new();
    // }
}
