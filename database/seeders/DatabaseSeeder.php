<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@ngo.test'],
            ['name' => 'Admin', 'password' => bcrypt('password')],
        );

        $this->call([
            ProjectSeeder::class,   // no dependencies
            DonorSeeder::class,     // no dependencies
            VolunteerSeeder::class, // no dependencies
            DonationSeeder::class,  // needs Donors + Projects
            BeneficiarySeeder::class, // needs Projects
            ExpenseSeeder::class,   // needs Projects
        ]);
    }
}
