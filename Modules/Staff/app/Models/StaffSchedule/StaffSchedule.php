<?php

namespace Modules\Staff\Models\StaffSchedule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Staff\Database\Factories\StaffSchedule/StaffScheduleFactory;

class StaffSchedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];
    protected $table = 'staff_schedules';
    protected $fillable = ['employee_id', 'day_id', 'time_id'];

    // protected static function newFactory(): StaffSchedule/StaffScheduleFactory
    // {
    //     // return StaffSchedule/StaffScheduleFactory::new();
    // }
}
