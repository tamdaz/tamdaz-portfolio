<?php

namespace App\Models;

use DateTimeInterface;
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

	public $timestamps = false;

	protected $casts = [
		'published_at' => 'date:d/m/Y'
	];
}
