<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
protected $fillable = [
        'department_id',
        'name',
        'position',
        'photo',
        'bio',
        'email',
        'phone',
        'education',
        'specialization',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function extracurriculars(): HasMany
    {
        return $this->hasMany(Extracurricular::class);
    }
}

