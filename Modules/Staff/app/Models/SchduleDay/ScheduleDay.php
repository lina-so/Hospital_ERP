<?php

namespace Modules\Staff\Models\SchduleDay;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Staff\Database\Factories\SchduleDay\ScheduleDayFactory;

class ScheduleDay extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['day_id','staff_schedule_id'];
    protected $table = 'schedule_days';

    // protected static function newFactory(): SchduleDay\ScheduleDayFactory
    // {
    //     // return SchduleDay\ScheduleDayFactory::new();
    // }
}
