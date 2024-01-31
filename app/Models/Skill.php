<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperSkill
 */
class Skill extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'skill_id', 'text_primary', 'text_secondary', 'has_no_colors',
    ];

    /**
     * @return HasOne<Attachment>
     */
    public function icon(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'skill_id');
    }
}
