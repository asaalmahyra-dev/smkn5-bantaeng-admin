<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Facility extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'location',
        'image',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
        ];
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'department_facility');
    }
}

