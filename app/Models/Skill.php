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
    use AsSource, Attachable, Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'img_skill', 'text_primary',
        'text_secondary', 'has_no_colors',
    ];
}
