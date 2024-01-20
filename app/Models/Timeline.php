<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperTimeline
 */
class Timeline extends Model
{
    use AsSource, Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'date_start', 'date_end', 'description', 'type',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'description' => 'string',
        'type' => 'string',
    ];

    /**
     * Filter timeline by type
     *
     * @param  Builder<Timeline>  $builder
     * @return Collection<int, Timeline>
     */
    public function scopeFilterByType(Builder $builder, string $type): Collection
    {
        return $builder->where('type', '=', $type)
            ->latest('date_start')
            ->get();
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}
