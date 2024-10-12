<?php

namespace Modules\Hospital\Models\Floor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Hospital\Database\Factories\Floor/FloorFactory;

class Floor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'floors';

    protected $fillable = ['name','floor_number'];

    // protected static function newFactory(): Floor/FloorFactory
    // {
    //     // return Floor/FloorFactory::new();
    // }
}
