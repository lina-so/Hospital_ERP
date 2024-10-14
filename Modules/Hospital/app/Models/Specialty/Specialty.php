<?php

namespace Modules\Hospital\Models\Specialty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Hospital\Database\Factories\SpecialtyFactory;

class Specialty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'specialties';

    protected $fillable = ['name'];

    protected static function newFactory()
    {
        return SpecialtyFactory::new();
    }
}
