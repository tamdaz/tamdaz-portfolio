<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperProfile
 */
class Profile extends Model
{
    use AsSource, Attachable, HasFactory;

    protected $fillable = [
        'name', 'job', 'img_profile',
    ];
}
