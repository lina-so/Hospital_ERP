<?php

namespace Modules\Hospital\Models\Equipment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Hospital\Database\Factories\Equipment/MedicalEquipmentFactory;

class MedicalEquipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $with = [];

    protected $table = 'medical_equipment';

    protected $fillable = ['equipment_name', 'amount', 'department_category_id'];


    // protected static function newFactory(): Equipment/MedicalEquipmentFactory
    // {
    //     // return Equipment/MedicalEquipmentFactory::new();
    // }
}
