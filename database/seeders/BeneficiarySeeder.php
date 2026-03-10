<?php

namespace Database\Seeders;

use App\Models\Beneficiary;
use App\Models\Project;
use Illuminate\Database\Seeder;

class BeneficiarySeeder extends Seeder
{
    public function run(): void
    {
        $projectIds = Project::pluck('id');

        Beneficiary::factory(80)->make()->each(function ($beneficiary) use ($projectIds): void {
            $beneficiary->project_id = fake()->optional(0.9)->randomElement($projectIds->all());
            $beneficiary->save();
        });
    }
}
