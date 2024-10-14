<?php

namespace Modules\Hospital\Models\Department;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Hospital\Database\Factories\DepartmentCategoryFactory;

class DepartmentCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'department_categories';

    protected $fillable = ['name'];

    protected static function newFactory()
    {
        return DepartmentCategoryFactory::new();
    }
}
