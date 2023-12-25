<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;

/**
 * @mixin IdeHelperProfile
 */
class Profile extends Model
{
    use AsSource, Attachable, HasFactory;

    protected $fillable = [
        'name', 'job', 'avatar_id'
    ];

    /**
     * @return HasOne<Attachment>
     */
    public function avatar(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'avatar_id');
    }
}
