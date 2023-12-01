<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id' ,
        'product_id' ,
        'quantity' ,
        'amount_total' ,
    ];

    public function sales() {
        return $this->belongsTo(Sales::class);
    }

    public function products() {
        return $this->belongsTo(Products::class);
    }
}
