<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

/**
 * @mixin IdeHelperBlog
 */
class Blog extends Model implements Sitemapable
{
    use AsSource, Attachable, Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'is_published', 'thumbnail_id', 'title', 'description', 'content', 'category_id',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get only published blogs
     *
     * @param  Builder<Blog>  $query
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }

    /**
     * Get a category linked to this blog
     *
     * @return BelongsTo<Category, Blog>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get a thumbnail linked to this blog
     *
     * @return HasOne<Attachment>
     */
    public function thumbnail(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'thumbnail_id')->withDefault();
    }

    /**
     * Generate automatically a URL for many blogs
     */
    public function toSitemapTag(): Url
    {
        return Url::create(route('pages.blogs.show', $this))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.6);
    }
}
