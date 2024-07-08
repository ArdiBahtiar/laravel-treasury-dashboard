<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'orders';
    protected $fillable = [
        'order_id',
        'order_date',
        'visit_date',
        'total_buy_price',
        'cancelled',
        'merchant_info',
        'cust_name',
        'cust_email',
        'cust_phone',
    ];
}
