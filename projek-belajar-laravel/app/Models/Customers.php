<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'code'  ,
        'name'  ,
        'phone_number'  ,
        'email' ,
        'address'   ,
        'is_active' ,
    ];

    public function sales() {
        return $this->hasMany(Sales::class);
    }
}
