<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
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
            'age' => fake()->optional()->numberBetween(5, 80),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'location' => fake()->city() . ', ' . fake()->country(),
            'project_id' => fake()->optional(0.9)->randomElement(\App\Models\Project::pluck('id')->all() ?: [null]),
        ];
    }
}
