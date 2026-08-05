<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
protected $fillable = [
        'department_id',
        'title',
        'category',
        'type',
        'image',
        'thumbnail',
        'video',
        'description',
        'taken_at',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'taken_at' => 'datetime',
            'featured' => 'boolean',
        ];
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}

