<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
