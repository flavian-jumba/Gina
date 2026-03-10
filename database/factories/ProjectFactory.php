<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-2 years', 'now');

        return [
            'project_name' => fake()->randomElement([
                'Clean Water Initiative', 'School Feeding Programme', 'Women Empowerment Project',
                'Youth Skills Training', 'Health Outreach Campaign', 'Disaster Relief Fund',
                'Community Sanitation Drive', 'Orphan Support Programme',
            ]) . ' ' . fake()->year(),
            'description' => fake()->paragraph(),
            'start_date' => $start,
            'end_date' => fake()->optional(0.7)->dateTimeBetween($start, '+2 years'),
            'status' => fake()->randomElement(['active', 'active', 'active', 'completed', 'on_hold', 'cancelled']),
        ];
    }
}
