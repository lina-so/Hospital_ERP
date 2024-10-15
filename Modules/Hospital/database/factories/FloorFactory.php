<?php

namespace Modules\Hospital\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Hospital\Models\Floor\Floor;

class FloorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Floor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        static $index = 1;
        $ordinals = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'];

        return [
            'name' => $ordinals[$index++-1],
            'floor_number' => $index - 1,
        ];



    }
}

