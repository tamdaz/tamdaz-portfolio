<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperReport
 */
class Report extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'category_id', 'report_id', 'file_created_at',
    ];

    /**
     * @return HasOne<Attachment>
     */
    public function file(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'report_id');
    }

    /**
     * @return BelongsTo<Category, Report>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @param  Builder<Report>  $builder
     * @return Builder<Report>
     */
    public function scopeLatestReport(Builder $builder): Builder
    {
        return $builder->orderByDesc('file_created_at');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}
