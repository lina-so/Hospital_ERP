<?php

namespace Modules\Hospital\Models\Department;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Hospital\Database\Factories\Department/DepartmentFactory;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'departments';

    protected $fillable = ['name', 'description', 'department_category_id'];


    // protected static function newFactory(): Department/DepartmentFactory
    // {
    //     // return Department/DepartmentFactory::new();
    // }
}
