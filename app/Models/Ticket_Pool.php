<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Pool extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'catalog_id',
        'folio_id',
    ];
}
