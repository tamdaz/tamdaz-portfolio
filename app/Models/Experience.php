<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperExperience
 */
class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start', 'date_end',
        'description'
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'description' => 'string'
    ];


    public function getFullDateAttribute(): string
    {
        return $this->date_start->format('M Y') . " - " . $this->date_end->format('M Y');
    }
}
