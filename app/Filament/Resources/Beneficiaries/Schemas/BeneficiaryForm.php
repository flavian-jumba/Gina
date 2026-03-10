<?php

namespace App\Filament\Resources\Beneficiaries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BeneficiaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('age')
                    ->numeric(),
                TextInput::make('gender'),
                TextInput::make('location'),
                Select::make('project_id')
                    ->relationship('project', 'project_name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
            ]);
    }
}
