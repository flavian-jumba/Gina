<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        $donorIds = Donor::pluck('id');
        $projectIds = Project::pluck('id');

        Donation::factory(60)->make()->each(function ($donation) use ($donorIds, $projectIds): void {
            $donation->donor_id = $donorIds->random();
            $donation->project_id = fake()->optional(0.8)->randomElement($projectIds->all());
            $donation->save();
        });
    }
}
