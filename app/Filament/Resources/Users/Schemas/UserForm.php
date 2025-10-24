<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Akun')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->grow(true),
                                TextInput::make('fullname')
                                    ->label('Full Name')
                                    ->grow(true),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email Address')
                                    ->email()
                                    ->required()
                                    ->grow(true),
                                DatePicker::make('birthdate')
                                    ->label('Birthdate')
                                    ->grow(true),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('phone')
                                    ->label('Phone')
                                    ->grow(true),
                                DateTimePicker::make('email_verified_at')
                                    ->label('Email Verified At')
                                    ->grow(true),
                            ]),
                        Textarea::make('address')
                            ->label('Address')
                            ->columnSpanFull(),
                        Grid::make(2)
                            ->schema([
                                Select::make('province')
                                    ->label('Province')
                                    ->options(Province::pluck('name', 'id'))
                                    ->searchable()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('city_regency', null);
                                        $set('district', null);
                                        $set('subdistrict', null);
                                    })
                                    ->grow(true),
                                Select::make('city_regency')
                                    ->label('City/Regency')
                                    ->options(function (callable $get) {
                                        $provinceId = $get('province');
                                        if ($provinceId) {
                                            return Regency::where('province_id', $provinceId)->pluck('name', 'id');
                                        }
                                        return [];
                                    })
                                    ->searchable()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('district', null);
                                        $set('subdistrict', null);
                                    })
                                    ->grow(true),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Select::make('district')
                                    ->label('District')
                                    ->options(function (callable $get) {
                                        $regencyId = $get('city_regency');
                                        if ($regencyId) {
                                            return District::where('regency_id', $regencyId)->pluck('name', 'id');
                                        }
                                        return [];
                                    })
                                    ->searchable()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('subdistrict', null);
                                    })
                                    ->grow(true),
                                Select::make('subdistrict')
                                    ->label('Subdistrict')
                                    ->options(function (callable $get) {
                                        $districtId = $get('district');
                                        if ($districtId) {
                                            return Village::where('district_id', $districtId)->pluck('name', 'id');
                                        }
                                        return [];
                                    })
                                    ->searchable()
                                    ->grow(true),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required(fn($context) => $context === 'create')
                                    ->dehydrateStateUsing(fn($state) => !empty($state) ? bcrypt($state) : null)
                                    ->dehydrated(fn($state) => !empty($state))
                                    ->grow(true),
                                Select::make('roles')
                                    ->multiple()
                                    ->relationship('roles', 'name')
                                    ->preload()
                                    ->label('Roles')
                                    ->grow(true),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
