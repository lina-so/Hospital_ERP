<?php

namespace Modules\Hospital\Database\Factories;

use Modules\Hospital\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Hospital\Models\Department\DepartmentCategory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'department_category_id' => DepartmentCategory::inRandomOrder()->first()->id,
        ];
    }
}

