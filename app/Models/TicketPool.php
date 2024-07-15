<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPool extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'ticket_pools';
    protected $fillable = [
        'id',
        'catalog_id',
        'folio_id',
    ];
}
