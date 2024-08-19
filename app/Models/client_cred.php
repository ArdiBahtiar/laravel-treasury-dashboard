<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_cred extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cli_name',
        'cli_pwd',
    ];

    protected $hidden = [
        'cli_pwd'
    ];
}
