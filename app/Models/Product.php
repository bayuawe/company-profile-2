<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'image',
        'is_active',
        'featured',
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products')
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
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        // Try to get the conversion url first from the 'images' collection,
        // then fall back to 'default', then any media URL.
        $url = $this->getFirstMediaUrl('images', 'preview');

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
