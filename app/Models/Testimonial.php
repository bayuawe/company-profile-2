<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'author_name',
        'text',
        'rating',
        'time',
        'profile_photo_url',
        'raw_data',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'time' => 'datetime',
        'raw_data' => 'array',
    ];
}
