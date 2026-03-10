<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->relationship('project', 'project_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0),
                Select::make('category')
                    ->options([
                        'salaries' => 'Salaries',
                        'equipment' => 'Equipment',
                        'transport' => 'Transport',
                        'food' => 'Food & Supplies',
                        'training' => 'Training',
                        'admin' => 'Administrative',
                        'other' => 'Other',
                    ])
                    ->required(),
                DatePicker::make('expense_date')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
