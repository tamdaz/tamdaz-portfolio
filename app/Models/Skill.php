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

    protected $fillable = [
        'img_skill', 'text_primary',
        'text_secondary',
    ];

    public function attachment(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'img_skill');
    }
}
