<?php

namespace Modules\Hospital\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Hospital\Database\Seeders\SeedDepartmentSeeder;
use Modules\Hospital\Database\Seeders\SeedDepartmentCategorySeeder;

class HospitalDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([
        //     SeedDepartmentCategorySeeder::class,
        //     SeedDepartmentSeeder::class,
        // ]);
    }
}
