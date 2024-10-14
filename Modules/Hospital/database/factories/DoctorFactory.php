<?php

namespace Modules\Hospital\Database\Factories;

use Modules\Hospital\Models\Doctor\Doctor;
use Modules\Hospital\Models\Specialty\Specialty;
use Modules\Hospital\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Hospital\Models\Department\DepartmentCategory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'specialization' => $this->faker->randomElement(['Cardiology', 'Neurology', 'Surgery', 'Pediatrics']),
            'phone_number' => $this->faker->phoneNumber(),
            'specialty_id' => Specialty::inRandomOrder()->first()->id,
            'department_id' => Department::inRandomOrder()->first()->id,
            'department_category_id' => DepartmentCategory::inRandomOrder()->first()->id,

        ];
    }
}

