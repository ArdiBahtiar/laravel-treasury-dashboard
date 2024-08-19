<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancelled_cart_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'catalog_id',
        'product_desc',
        'product_price',
        'folio_id',
        'order_id',
        'redeemed',
        'redeemed_date',
    ];
}
