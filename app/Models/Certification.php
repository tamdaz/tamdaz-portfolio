<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Certification extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'primary', 'secondary', 'certificate_id', 'has_certificate'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'has_certificate' => 'boolean'
    ];

    /**
     * @return HasOne
     */
    public function certificate(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'certificate_id')->withDefault();
    }
}