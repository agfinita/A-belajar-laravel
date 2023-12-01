<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'code' ,
        'trx_date' ,
        'sub_amount' ,
        'amount_total' ,
        'discount' ,
        'total_product' ,
        'vendor_id' ,
        'description' ,
    ];

    public function vendors() {
        return $this->belongsTo(Sales::class);
    }

    public function purchaseDetails() {
        return $this->hasMany(PurchaseDetails::class);
    }
}
