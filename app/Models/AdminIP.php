<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAdminIP
 */
class AdminIP extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'admin_ips';

    /**
     * @var string[]
     */
    protected $fillable = [
        'ip_address',
    ];
}
