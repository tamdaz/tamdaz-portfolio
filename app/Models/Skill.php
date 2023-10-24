<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperSkill
 */
class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_skill', 'text_primary',
        'text_secondary',
    ];
}
