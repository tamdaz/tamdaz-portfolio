<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminIP extends Model
{
    use HasFactory;

    protected $table = 'admin_ip';

    protected $fillable = [ 'ip' ];
}
