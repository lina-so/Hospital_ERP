<?php

namespace Modules\Staff\Models\StaffSchedule;

use Modules\Core\Models\Day\Day;
use Modules\Core\Models\Time\Time;
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
    protected $fillable = ['employeeable_type','employeeable_id', 'time_id'];

    public function employeeable()
    {
        return $this->morphTo();
    }
    public function days()
    {
        return $this->belongsToMany(Day::class, 'schedule_days');
    }
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
    // protected static function newFactory(): StaffSchedule/StaffScheduleFactory
    // {
    //     // return StaffSchedule/StaffScheduleFactory::new();
    // }
}
