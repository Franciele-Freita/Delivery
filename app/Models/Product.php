<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'store_id',
        'category_partner_id',
        'name',
        'description',
        'price',
        'discount',
        'status',
        'image',

    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function scopeIsActive($query)
    {
        $query->where('status', 1);
    }

    public function category()
    {
        return $this->hasOne(CategoryPartner::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class,'id', 'product_id');
    }


}


