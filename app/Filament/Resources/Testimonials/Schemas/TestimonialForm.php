<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('author_name')
                    ->required(),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('time')
                    ->required(),
                TextInput::make('profile_photo_url')
                    ->url(),
                TextInput::make('raw_data'),
            ]);
    }
}
