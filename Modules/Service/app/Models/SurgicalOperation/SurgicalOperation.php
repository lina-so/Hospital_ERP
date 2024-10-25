<?php

namespace Modules\Service\Models\SurgicalOperation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Service\Database\Factories\SurgicalOperation/SurgicalOperationFactory;

class SurgicalOperation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'surgical_operations';

    protected $fillable = ['patient_id', 'doctor_id', 'room_id',
     'operation_type', 'duration', 'status', 'operation_date','appointment_id'];


    // protected static function newFactory(): SurgicalOperation/SurgicalOperationFactory
    // {
    //     // return SurgicalOperation/SurgicalOperationFactory::new();
    // }
}
