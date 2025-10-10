<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_title')
                    ->searchable(),
                TextColumn::make('site_description')
                    ->searchable(),
                SpatieMediaLibraryImageColumn::make('site_logo')
                    ->collection('site_logos')
                    ->conversion('preview')
                    ->label('Site Logo'),
                SpatieMediaLibraryImageColumn::make('site_favicon')
                    ->collection('site_favicons')
                    ->conversion('preview')
                    ->label('Site Favicon'),
                SpatieMediaLibraryImageColumn::make('hero_image')
                    ->collection('hero_images')
                    ->conversion('preview')
                    ->label('Hero Image'),
                TextColumn::make('hero_title')
                    ->searchable(),
                TextColumn::make('hero_subtitle')
                    ->searchable(),
                SpatieMediaLibraryImageColumn::make('about_image')
                    ->collection('about_images')
                    ->conversion('preview')
                    ->label('About Image'),
                TextColumn::make('contact_address')
                    ->searchable(),
                TextColumn::make('contact_email')
                    ->searchable(),
                TextColumn::make('contact_phone')
                    ->searchable(),
                TextColumn::make('social_facebook')
                    ->searchable(),
                TextColumn::make('social_instagram')
                    ->searchable(),
                TextColumn::make('social_tiktok')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
