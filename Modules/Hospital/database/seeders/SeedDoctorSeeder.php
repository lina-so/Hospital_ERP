<?php

namespace Modules\Hospital\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Hospital\Models\Doctor\Doctor;

class SeedDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        Doctor::factory()->count(10)->create();

    }
}
