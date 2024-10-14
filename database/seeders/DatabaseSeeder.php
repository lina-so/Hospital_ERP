<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Hospital\Database\Seeders\SpecialtySeeder;
use Modules\Hospital\Database\Seeders\SeedDoctorSeeder;
use Modules\Hospital\Database\Seeders\SeedDepartmentSeeder;
use Modules\Hospital\Database\Seeders\SeedDepartmentCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(1)->create();

        $this->call([
            // SeedDepartmentCategorySeeder::class,
            // SeedDepartmentSeeder::class,
            // SpecialtySeeder::class,
            // SeedDoctorSeeder::class,
        ]);
    }
}
