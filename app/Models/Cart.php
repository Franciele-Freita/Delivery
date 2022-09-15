<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'user_id',
        'store_id',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    public function details()
    {
        return $this->hasMany(CartDetails::class, 'cart_id', 'cart_id');
    }

    public function store()
    {
        return $this->hasMany(Store::class, 'id', 'store_id');
    }

}
