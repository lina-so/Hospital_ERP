<?php

namespace Modules\Core\Models\Time;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Core\Database\Factories\Time/TimeFactory;

class Time extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'times';

    protected $fillable = ['end_time','start_time'];

    // protected static function newFactory(): Time/TimeFactory
    // {
    //     // return Time/TimeFactory::new();
    // }
}
