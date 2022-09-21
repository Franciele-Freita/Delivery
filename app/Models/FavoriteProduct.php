<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_id',
        'product_id',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }


}
