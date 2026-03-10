<?php

namespace App\Filament\Widgets;

use App\Models\Beneficiary;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Volunteer;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalDonations = Donation::query()->sum('amount');
        $totalExpenses = Expense::query()->sum('amount');

        return [
            Stat::make('Total Funds Raised', '$' . number_format($totalDonations, 2))
                ->description('All-time donations received')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Expenses', '$' . number_format($totalExpenses, 2))
                ->description('All-time project expenses')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),

            Stat::make('Donors', Donor::query()->count())
                ->description('Registered donors')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Active Projects', Project::query()->where('status', 'active')->count())
                ->description(Project::query()->count() . ' total projects')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning'),

            Stat::make('Beneficiaries', Beneficiary::query()->count())
                ->description('People supported')
                ->descriptionIcon('heroicon-m-heart')
                ->color('primary'),

            Stat::make('Active Volunteers', Volunteer::query()->where('status', 'active')->count())
                ->description(Volunteer::query()->count() . ' total volunteers')
                ->descriptionIcon('heroicon-m-hand-raised')
                ->color('success'),
        ];
    }
}
