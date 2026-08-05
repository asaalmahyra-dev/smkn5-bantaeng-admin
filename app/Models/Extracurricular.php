<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extracurricular extends Model
{
protected $fillable = [
        'name',
        'slug',
        'short_name',
        'category',
        'teacher_id',
        'schedule',
        'location',
        'icon',
        'image',
        'image_alt',
        'color',
        'description',
        'short_description',
        'highlights',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'highlights' => 'array',
            'featured' => 'boolean',
        ];
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}

