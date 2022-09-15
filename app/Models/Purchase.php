<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id',
        'cart_id',
        'user_id',
        'store_id',
        'payment_id'
    ];

    public function Payment()
    {
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }

    public function Details()
    {
        return $this->hasMany(CartDetails::class, 'cart_id', 'cart_id');
    }

    public function Store()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }
}
