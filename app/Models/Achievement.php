<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'year',
        'level',
        'participants',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'participants' => 'array',
            'featured' => 'boolean',
        ];
    }
}

