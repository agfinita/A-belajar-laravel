<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'code' ,
        'trx_date' ,
        'sub_amount' ,
        'amount_total' ,
        'discount' ,
        'total_product' ,
        'customer_id' ,
        'description' ,
    ];

    public function customers() {
        return $this->belongsTo(Customers::class);
    }

    public function salesDetails() {
        return $this->hasMany(SalesDetails::class);
    }
}
