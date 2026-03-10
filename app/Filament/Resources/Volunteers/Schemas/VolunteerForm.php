<?php

namespace App\Filament\Resources\Volunteers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VolunteerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->unique(ignoreRecord: true),
                TextInput::make('phone')
                    ->tel(),
                Textarea::make('skills')
                    ->rows(2)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'on_leave' => 'On Leave',
                    ])
                    ->required()
                    ->default('active'),
                DatePicker::make('joined_at'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
