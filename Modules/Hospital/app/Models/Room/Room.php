<?php

namespace Modules\Hospital\Models\Room;

use Modules\Hospital\Models\Room\Room;
use Illuminate\Database\Eloquent\Model;
use Modules\Hospital\Models\Floor\Floor;
use Modules\Hospital\Models\Room\RoomCategory;
use Modules\Hospital\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Hospital\Database\Factories\Room/RoomFactory;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    // protected $with = ['department'];

    protected $table = 'rooms';

    protected $fillable = ['room_number', 'department_id', 'floor_id', 'status','room_category_id'];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class);
    }
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    protected static function booted()
    {
        // dd( Room::latest()->pluck('room_number')->first());
        // dd(Room::max('room_number') );
        static::creating(function ($room) {
            $room->room_number = Room::latest()->pluck('room_number')->first() + 1;
        });

    }
    // protected static function newFactory(): Room/RoomFactory
    // {
    //     // return Room/RoomFactory::new();
    // }
}
