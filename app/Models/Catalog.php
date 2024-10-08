<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'catalogs';
    protected $fillable = [
        'catalog_id',
        'product_desc',
        'product_price',
        'product_info',
    ];
}
