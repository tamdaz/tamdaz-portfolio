<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperTW
 */
class TW extends Model
{
    use AsSource, Filterable, HasFactory;

    protected $table = 'tw';
}
