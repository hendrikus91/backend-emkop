<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['male', 'female']);

        return [
            'name' => fake()->name($gender),
            'dob' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'gender' => $gender,
            'department' => fake()->randomElement(['FINANCE','IT','HR & GA','DIGITAL MARKETING','LEGAL','BUSINESS','SALES'])
        ];
    }
}
