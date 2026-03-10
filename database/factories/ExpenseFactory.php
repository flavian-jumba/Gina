<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => \App\Models\Project::factory(),
            'title' => fake()->randomElement([
                'Staff transport', 'Office supplies', 'Field equipment', 'Training materials',
                'Venue hire', 'Printing costs', 'Community meals', 'Medical supplies',
            ]),
            'amount' => fake()->randomFloat(2, 20, 3000),
            'category' => fake()->randomElement(['salaries', 'equipment', 'transport', 'food', 'training', 'admin', 'other']),
            'expense_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
