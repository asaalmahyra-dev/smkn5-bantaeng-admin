<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'slug',
        'category',
        'headline',
        'description',
        'vision',
        'mission',
        'competencies',
        'career_paths',
        'cover_image',
        'gallery',
        'featured',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'mission' => 'array',
            'competencies' => 'array',
            'career_paths' => 'array',
            'gallery' => 'array',
            'featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'department_facility');
    }

    public function partners(): BelongsToMany
    {
        return $this->belongsToMany(Partner::class, 'department_partner');
    }
}
