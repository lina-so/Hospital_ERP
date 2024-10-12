<?php

namespace Modules\Staff\Models\OperationStaff;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Staff\Database\Factories\OperationStaff/OperationStaffFactory;

class OperationStaff extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];
    protected $table = 'operation_staff';
    protected $fillable = ['department_id', 'employee_id', 'role_in_operation'];


    // protected static function newFactory(): OperationStaff/OperationStaffFactory
    // {
    //     // return OperationStaff/OperationStaffFactory::new();
    // }
}
