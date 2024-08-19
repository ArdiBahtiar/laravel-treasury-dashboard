<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merchant_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'merch_key',
        'merch_name',
        'internal_agent',
    ];
}
