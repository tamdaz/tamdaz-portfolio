<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use AsSource, Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var array<string, string>
     */
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

    /**
     * @param  Builder<Category>  $builder
     * @return Builder<Category>
     */
    public function scopeUsedForBlogs(Builder $builder): Builder
    {
        return $builder->where('used_for', '=', 'blogs');
    }

    /**
     * @param  Builder<Category>  $builder
     * @return Builder<Category>
     */
    public function scopeUsedForReports(Builder $builder): Builder
    {
        return $builder->where('used_for', '=', 'reports');
    }

    /**
     * @return HasMany<Report>
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'report_id', 'id');
    }
}
