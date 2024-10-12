<?php

namespace Modules\Hospital\Models\Room;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Hospital\Database\Factories\Room/RoomCategoryFactory;

class RoomCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'room_categories';

    protected $fillable = ['name'];

    // protected static function newFactory(): Room/RoomCategoryFactory
    // {
    //     // return Room/RoomCategoryFactory::new();
    // }
}
