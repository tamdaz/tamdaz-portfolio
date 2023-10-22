<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Factories\HasFactory, Model};

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_published', 'project_thumb',
        'title', 'description',
        'content', 'project_url'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }
}
