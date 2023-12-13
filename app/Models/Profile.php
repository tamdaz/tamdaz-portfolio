<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, Relations\HasOne};

/**
 * @mixin IdeHelperProfile
 */
class Profile extends Model
{
    use HasFactory, AsSource, Attachable;

    protected $fillable = [
        'name', 'job', 'img_profile',
    ];
}
