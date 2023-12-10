<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperSkill
 */
class Skill extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    protected $fillable = [
        'img_skill', 'text_primary',
        'text_secondary',
    ];
}
