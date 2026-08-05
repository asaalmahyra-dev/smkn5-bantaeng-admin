<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image',
        'author',
        'published_at',
        'featured',
        'status',
        'tags',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'featured' => 'boolean',
            'tags' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }
}

