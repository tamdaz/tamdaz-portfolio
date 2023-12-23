<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperMaintenance
 */
class Maintenance extends Model
{
    use AsSource, HasFactory;

    protected $fillable = [
        'message', 'end_maintenance',
    ];

    protected $casts = [
        'end_maintenance' => 'datetime',
    ];
}
