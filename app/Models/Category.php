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
}
