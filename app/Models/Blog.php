<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Builder, Factories\HasFactory};

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_published', 'blog_thumb',
        'title', 'description', 'content'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }
}
