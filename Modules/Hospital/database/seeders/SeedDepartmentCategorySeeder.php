<?php

namespace Modules\Hospital\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Hospital\Models\Department\DepartmentCategory;

class SeedDepartmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department_categories')->delete();

        $departments = [

            'Emergency Department',
            'Surgery Department',
            'Internal Medicine Department',
            'Pediatrics Department',
            'Obstetrics and Gynecology Department (OB/GYN)',
            'Cardiology Department',
            'Radiology Department',
            'Oncology Department',
            'Orthopedics Department',
            'Psychiatry Department',
            'Intensive Care Unit (ICU)',
            'Laboratory Services',
        ];

        foreach ($departments as $dep) {
            DepartmentCategory::create(['name' => $dep]);
        }
    }
}
