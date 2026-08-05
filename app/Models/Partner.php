<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'industry',
        'description',
        'website',
        'collaboration_type',
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
        return $this->belongsToMany(Department::class, 'department_partner');
    }
}

