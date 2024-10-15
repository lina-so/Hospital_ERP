<?php

namespace Modules\Hospital\Models\Department;

use Modules\Hospital\Models\Room\Room;
use Illuminate\Database\Eloquent\Model;
use Modules\Hospital\Models\Doctor\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Hospital\Database\Factories\DepartmentFactory;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    // protected $with = ['doctors','rooms'];

    protected $table = 'departments';

    protected $fillable = ['name', 'description', 'department_category_id'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    protected static function newFactory()
    {
        return DepartmentFactory::new();
    }
}
