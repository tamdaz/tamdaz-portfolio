<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProfile
 */
class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'job', 'content', 'img_profile',
    ];
}
