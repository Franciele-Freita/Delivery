<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'cod',
        'user_id',
        'store_id',
        'product_id',
        'qtd',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
