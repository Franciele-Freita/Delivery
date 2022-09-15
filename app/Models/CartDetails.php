<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'store_id',
        'product_id',
        'qtd',
        'price',
        'total',
        'commit',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'cart_id', 'cart_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
