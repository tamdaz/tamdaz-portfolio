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
 * @mixin IdeHelperCertification
 */
class Certification extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'primary', 'secondary', 'certificate_id', 'has_certificate',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'has_certificate' => 'boolean',
    ];

    /**
     * @return HasOne<Attachment>
     */
    public function certificate(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'certificate_id');
    }
}
