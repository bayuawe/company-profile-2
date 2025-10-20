<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'settings';

    protected $fillable = [
        'site_title',
        'site_description',
        'meta_description',
        'meta_keywords',
        'hero_title',
        'hero_subtitle',
        'about_content',
        'contact_address',
        'contact_email',
        'contact_phone',
        'social_facebook',
        'social_tiktok',
        'social_instagram',
    ];

    public $incrementing = true;

    public $timestamps = true;

    // Helper method to get single settings instance
    public static function getSiteSettings()
    {
        return self::firstOrCreate();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('site_logo')
            ->useDisk('public')
            ->singleFile();

        $this->addMediaCollection('site_favicon')
            ->useDisk('public')
            ->singleFile();

        // Untuk carousel (banyak gambar), jangan pakai singleFile()
        $this->addMediaCollection('hero_images')
            ->useDisk('public');

        $this->addMediaCollection('about_image')
            ->useDisk('public')
            ->singleFile();

        $this->addMediaCollection('contact_image')
            ->useDisk('public')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    /**
     * Accessor to get the product image URL.
     * Returns the 'preview' conversion URL if available, otherwise the original media URL.
     * If no media exists, returns an empty string.
     *
     * Usage in Blade: <img src="{{ $product->image_url ?: asset('images/no-image.png') }}" alt="...">
     */
    public function getImageUrlAttribute(): string
    {
        // Try to get the conversion url first from the 'settings' collection,
        // then fall back to 'default', then any media URL.
        $url = $this->getFirstMediaUrl('settings', 'preview');

        if (empty($url)) {
            $url = $this->getFirstMediaUrl('default', 'preview');
        }

        // Fallback to the original media url (no conversion)
        if (empty($url)) {
            $url = $this->getFirstMediaUrl();
        }

        return $url ?: '';
    }
}
