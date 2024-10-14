<?php

namespace Modules\Hospital\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Hospital\Models\Department\DepartmentCategory;

class DepartmentCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = DepartmentCategory::class;

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

