<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Volunteer>
 */
class VolunteerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'skills' => implode(', ', fake()->randomElements([
                'Teaching', 'Nursing', 'Carpentry', 'Cooking', 'Driving',
                'Accounting', 'Translation', 'IT Support', 'Counselling', 'Logistics',
            ], fake()->numberBetween(1, 3))),
            'status' => fake()->randomElement(['active', 'active', 'active', 'inactive', 'on_leave']),
            'joined_at' => fake()->dateTimeBetween('-3 years', 'now'),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
