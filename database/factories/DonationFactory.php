<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donor_id' => \App\Models\Donor::factory(),
            'project_id' => fake()->optional(0.8)->randomElement(\App\Models\Project::pluck('id')->all() ?: [null]),
            'amount' => fake()->randomFloat(2, 50, 5000),
            'donation_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
