<?php

namespace Modules\Core\Models\Day;

use Illuminate\Database\Eloquent\Model;
use Modules\Staff\Models\StaffSchedule\StaffSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Core\Database\Factories\Day/DayFactory;

class Day extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'days';

    protected $fillable = ['name'];

    public function schedules()
    {
        return $this->belongsToMany(StaffSchedule::class, 'schedule_days');
    }
    // protected static function newFactory(): Day/DayFactory
    // {
    //     // return Day/DayFactory::new();
    // }
}
