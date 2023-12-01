<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name'  ,
        'category_id'   ,
        'product_code'  ,
        'price' ,
        'description'   ,
        'unit'  ,
        'stock' ,
        'discount'  ,
        'image' ,
    ];

    public function productCategories() {
        return $this->belongsTo(ProductCategories::class);
    }

    public function productsCirculations() {
        return $this->hasOne(ProductsCirculations::class);
    }

    public function purchaseDetails() {
        return $this->hasMany(PurchaseDetails::class);
    }

    public function salesDetails() {
        return $this->hasMany(SalesDetails::class);
    }
}
