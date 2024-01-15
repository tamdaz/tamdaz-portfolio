<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
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

    protected $fillable = [
        'date_start', 'date_end', 'description', 'type',
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'description' => 'string',
        'type' => 'string'
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}
