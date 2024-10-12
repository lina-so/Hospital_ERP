<?php

namespace Modules\Hospital\Models\Room;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Hospital\Database\Factories\Room/RoomFactory;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'rooms';

    protected $fillable = ['room_number', 'department_category_id', 'floor_id', 'status'];


    // protected static function newFactory(): Room/RoomFactory
    // {
    //     // return Room/RoomFactory::new();
    // }
}
