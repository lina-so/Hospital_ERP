<?php

namespace Modules\Hospital\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('medical_equipment')->delete();

        $medicalEquipments = [
            ['equipment_name' => 'Ventilator', 'amount' => 5, 'department_category_id' => 25],
            ['equipment_name' => 'Defibrillator', 'amount' => 3, 'department_category_id' => 26],
            ['equipment_name' => 'ECG Machine', 'amount' => 4, 'department_category_id' => 27],
            ['equipment_name' => 'Infusion Pump', 'amount' => 7, 'department_category_id' => 28],
            ['equipment_name' => 'Ultrasound Machine', 'amount' => 2, 'department_category_id' => 29],
            ['equipment_name' => 'X-ray Machine', 'amount' => 3, 'department_category_id' => 30],
            ['equipment_name' => 'MRI Scanner', 'amount' => 1, 'department_category_id' => 31],
            ['equipment_name' => 'CT Scanner', 'amount' => 2, 'department_category_id' => 32],
            ['equipment_name' => 'Dialysis Machine', 'amount' => 6, 'department_category_id' => 33],
            ['equipment_name' => 'Surgical Table', 'amount' => 10, 'department_category_id' => 34],
            ['equipment_name' => 'Anesthesia Machine', 'amount' => 4, 'department_category_id' => 35],
            ['equipment_name' => 'Patient Monitor', 'amount' => 8, 'department_category_id' => 36],
            ['equipment_name' => 'Syringe Pump', 'amount' => 12, 'department_category_id' => 38],
            ['equipment_name' => 'Endoscope', 'amount' => 2, 'department_category_id' => 39],
            ['equipment_name' => 'Autoclave', 'amount' => 5, 'department_category_id' => 39],
            ['equipment_name' => 'Nebulizer', 'amount' => 10, 'department_category_id' => 40],
            ['equipment_name' => 'Oxygen Concentrator', 'amount' => 8, 'department_category_id' => 41],
            ['equipment_name' => 'Incubator', 'amount' => 6, 'department_category_id' => 42],
            ['equipment_name' => 'Blood Gas Analyzer', 'amount' => 2, 'department_category_id' => 40],
            ['equipment_name' => 'Suction Machine', 'amount' => 3, 'department_category_id' => 25],
            ['equipment_name' => 'Electrosurgical Unit', 'amount' => 5, 'department_category_id' => 26],
            ['equipment_name' => 'Hemodialysis Machine', 'amount' => 3, 'department_category_id' => 26],
            ['equipment_name' => 'Cardiac Monitor', 'amount' => 7, 'department_category_id' => 27],
            ['equipment_name' => 'Pulse Oximeter', 'amount' => 15, 'department_category_id' => 28],
            ['equipment_name' => 'Laryngoscope', 'amount' => 6, 'department_category_id' => 29],
            ['equipment_name' => 'Dermatoscope', 'amount' => 2, 'department_category_id' => 30],
            ['equipment_name' => 'Bone Densitometer', 'amount' => 1, 'department_category_id' => 31],
            ['equipment_name' => 'C-Arm Fluoroscopy', 'amount' => 1, 'department_category_id' => 32],
            ['equipment_name' => 'Colposcope', 'amount' => 1, 'department_category_id' => 33],
            ['equipment_name' => 'Spirometer', 'amount' => 3, 'department_category_id' => 34],
        ];

        DB::table('medical_equipment')->insert($medicalEquipments);
    }
}
