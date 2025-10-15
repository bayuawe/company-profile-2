<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Situs')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('site_title')
                                    ->label('Judul Situs'),
                                TextInput::make('site_description')
                                    ->label('Deskripsi Situs'),
                            ]),
                        Grid::make(2)
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('site_logo')
                                    ->collection('site_logo')
                                    ->conversion('preview')
                                    ->imageEditor()
                                    ->panelLayout('integrated')
                                    ->label('Logo Situs'),
                                SpatieMediaLibraryFileUpload::make('site_favicon')
                                    ->collection('site_favicon')
                                    ->conversion('preview')
                                    ->imageEditor()
                                    ->panelLayout('integrated')
                                    ->label('Favicon'),
                            ]),
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->columnSpanFull(),
                        Textarea::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('Hero Section')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('hero_images') // pakai jamak
                            ->collection('hero_images')
                            ->multiple() // aktifkan multiple upload
                            ->conversion('preview')
                            ->label('Hero Images'),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('hero_title')
                                    ->label('Hero Title'),
                                TextInput::make('hero_subtitle')
                                    ->label('Hero Subtitle'),
                            ]),
                    ]),

                Section::make('About Section')
                    ->schema([
                        Textarea::make('about_content')
                            ->label('About Content')
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('about_image')
                            ->collection('about_image')
                            ->conversion('preview')
                            ->imageEditor()
                            ->panelLayout('integrated')
                            ->label('About Image'),
                    ]),

                Section::make('Kontak')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextInput::make('contact_address')
                                    ->label('Alamat'),
                                TextInput::make('contact_email')
                                    ->email()
                                    ->label('Email'),
                                TextInput::make('contact_phone')
                                    ->tel()
                                    ->label('Telepon'),
                            ]),
                    ]),

                Section::make('Media Sosial')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextInput::make('social_facebook')
                                    ->label('Facebook'),
                                TextInput::make('social_instagram')
                                    ->label('Instagram'),
                                TextInput::make('social_tiktok')
                                    ->label('TikTok'),
                            ]),
                    ]),
            ]);
    }
}
