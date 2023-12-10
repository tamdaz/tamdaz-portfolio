<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
    ];

    /**
     * @return HasMany<Blog>
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
