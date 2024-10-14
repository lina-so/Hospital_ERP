<?php

namespace Modules\Hospital\Database\Factories;

use Modules\Hospital\Models\Specialty\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialtyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Specialty::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}

