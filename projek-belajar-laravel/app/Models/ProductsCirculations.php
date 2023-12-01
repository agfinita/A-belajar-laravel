<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCirculations extends Model
{
    use HasFactory;

    protected $fillable = [
        'trx_date' ,
        'reff',
        'in' ,
        'out' ,
        'product_id' ,
        'remaining_stock' ,
    ];

    public function products() {
        return $this->belongsTo(Products::class);
    }
}
