<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperExperience
 */
class Experience extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

    protected $fillable = [
        'date_start', 'date_end', 'description',
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'description' => 'string',
    ];

    public function getFullDateAttribute(): string
    {
        return $this->date_start->format('M Y').' - '.$this->date_end->format('M Y');
    }
}
