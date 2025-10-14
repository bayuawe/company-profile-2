<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    // Relasi ke Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories')
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
     * Accessor to get the bank logo URL.
     * Returns the 'preview' conversion URL if available, otherwise the original media URL.
     * If no media exists, returns an empty string.
     *
     * Usage in Blade: <img src="{{ $bank->logo_url ?: asset('images/no-image.png') }}" alt="...">
     *
     * @return string
     */
    public function getLogoUrlAttribute(): string
    {
        // Try to get the conversion url first from the 'categories' collection,
        // then fall back to 'default', then any media URL.
        $url = $this->getFirstMediaUrl('categories', 'preview');

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
