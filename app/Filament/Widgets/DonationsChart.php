<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class DonationsChart extends ChartWidget
{
    protected ?string $heading = 'Monthly Donations';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $year = now()->year;

        $data = collect(range(1, 12))->map(function (int $month) use ($year): float {
            return (float) Donation::query()
                ->whereYear('donation_date', $year)
                ->whereMonth('donation_date', $month)
                ->sum('amount');
        });

        return [
            'datasets' => [
                [
                    'label' => 'Donations ($)',
                    'data' => $data->values()->all(),
                    'backgroundColor' => 'rgba(16, 185, 129, 0.6)',
                    'borderColor' => 'rgb(16, 185, 129)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
