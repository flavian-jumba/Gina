<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('donor_id')
                    ->relationship('donor', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('project_id')
                    ->relationship('project', 'project_name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0),
                DatePicker::make('donation_date')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
