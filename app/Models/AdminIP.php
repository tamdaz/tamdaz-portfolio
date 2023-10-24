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

    protected $table = 'admin_ip';

    protected $fillable = ['ip'];
}
