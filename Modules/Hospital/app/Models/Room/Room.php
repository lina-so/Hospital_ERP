<?php

namespace Modules\Hospital\Models\Room;

use Modules\Hospital\Models\Room\Room;
use Illuminate\Database\Eloquent\Model;
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

    protected $fillable = ['room_number', 'department_id', 'floor_id', 'status'];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    protected static function booted()
    {
        static::creating(function ($room) {
            $room->room_number = Room::max('room_number') + 1;
        });

    }
    // protected static function newFactory(): Room/RoomFactory
    // {
    //     // return Room/RoomFactory::new();
    // }
}
