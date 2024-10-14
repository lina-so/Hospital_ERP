<?php

namespace Modules\Hospital\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Hospital\Models\Department\Department;
use Modules\Hospital\Models\Department\DepartmentCategory;

class SeedDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory()->count(10)->create();

    }
}
