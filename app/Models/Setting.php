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
        'site_logo',
        'site_favicon',
        'meta_description',
        'meta_keywords',
        'hero_image',
        'hero_title',
        'hero_subtitle',
        'about_content',
        'about_image',
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

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
