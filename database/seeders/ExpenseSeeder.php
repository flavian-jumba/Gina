<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        $projectIds = Project::pluck('id');

        Expense::factory(50)->make()->each(function ($expense) use ($projectIds): void {
            $expense->project_id = $projectIds->random();
            $expense->save();
        });
    }
}
