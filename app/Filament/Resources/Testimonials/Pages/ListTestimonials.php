<?php

namespace App\Filament\Resources\Testimonials\Pages;

use App\Filament\Resources\Testimonials\TestimonialResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;

class ListTestimonials extends ListRecords
{
    protected static string $resource = TestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('fetch-google-reviews')
                ->label('Fetch Google Reviews')
                ->icon('heroicon-o-cloud-arrow-down')
                ->action(function () {
                    $exitCode = Artisan::call('app:fetch-google-reviews');

                    if ($exitCode === 0) {
                        Notification::make()
                            ->title('Google Reviews Fetched Successfully')
                            ->body('New reviews have been imported.')
                            ->success()
                            ->send();

                        $this->refreshTable();
                    } else {
                        $output = Artisan::output();
                        Notification::make()
                            ->title('Failed to Fetch Google Reviews')
                            ->body($output ?: 'An error occurred while fetching reviews.')
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}
