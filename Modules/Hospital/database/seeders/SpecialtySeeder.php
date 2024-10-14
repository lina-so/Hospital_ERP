<?php

namespace Modules\Hospital\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Hospital\Models\Specialty\Specialty;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        Specialty::factory()->count(5)->create();

    }
}
