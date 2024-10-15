<?php

namespace Modules\Hospital\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Hospital\Models\Floor\Floor;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        Floor::factory()->count(10)->create();

    }
}
