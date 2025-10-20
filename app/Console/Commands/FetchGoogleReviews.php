<?php

namespace App\Console\Commands;

use App\Models\Testimonial;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchGoogleReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-google-reviews {place_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Google Reviews using Places API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = config('services.google_places.api_key');
        $placeId = $this->argument('place_id') ?? config('services.google_places.place_id');

        if (!$apiKey) {
            $this->error('Google Places API key not configured. Set GOOGLE_PLACES_API_KEY in .env');
            return 1;
        }

        if (!$placeId) {
            $this->error('Place ID not provided. Set GOOGLE_PLACES_PLACE_ID in .env or pass as argument');
            return 1;
        }

        $this->info('Fetching reviews from Google Places API...');

        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => $placeId,
                'fields' => 'reviews',
                'key' => $apiKey,
            ]);

            if ($response->failed()) {
                $this->error('Failed to fetch reviews: ' . $response->body());
                return 1;
            }

            $data = $response->json();

            if (!isset($data['result']['reviews'])) {
                $this->error('No reviews found in response');
                return 1;
            }

            $reviews = $data['result']['reviews'];
            $count = 0;

            foreach ($reviews as $review) {
                Testimonial::updateOrCreate(
                    ['author_name' => $review['author_name'], 'time' => date('Y-m-d H:i:s', $review['time'])],
                    [
                        'text' => $review['text'],
                        'rating' => $review['rating'],
                        'profile_photo_url' => $review['profile_photo_url'] ?? null,
                        'raw_data' => $review,
                    ]
                );
                $count++;
            }

            $this->info("Successfully imported {$count} reviews");
            return 0;

        } catch (\Exception $e) {
            $this->error('Error fetching reviews: ' . $e->getMessage());
            return 1;
        }
    }
}
