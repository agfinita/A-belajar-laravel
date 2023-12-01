<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name' ,
        'is_active' ,
        'description' ,
    ];

    public function user() {
        return $this->hasMany(User::class);
    }
}
