<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperBlog
 */
class Blog extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'is_published', 'blog_thumb', 'title', 'description', 'content', 'category_id',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * @param  Builder<Blog>  $query
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }

    /**
     * @return BelongsTo<Category, Blog>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
