<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestDonations extends TableWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Latest Donations')
            ->query(
                fn (): Builder => Donation::query()
                    ->with(['donor', 'project'])
                    ->latest('donation_date')
                    ->limit(8)
            )
            ->columns([
                TextColumn::make('donor.name')
                    ->label('Donor')
                    ->searchable(),
                TextColumn::make('project.project_name')
                    ->label('Project')
                    ->placeholder('—'),
                TextColumn::make('amount')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('donation_date')
                    ->label('Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('notes')
                    ->limit(40)
                    ->placeholder('—'),
            ]);
    }
}
