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

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string'
    ];

    /**
     * @return HasMany<Blog>
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeUsedForBlogs(Builder $builder): Builder
    {
        return $builder->where('used_for', '=', 'blogs');
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeUsedForReports(Builder $builder): Builder
    {
        return $builder->where('used_for', '=', 'reports');
    }

    /**
     * @return HasMany<int, Report>
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'report_id', 'id');
    }
}
