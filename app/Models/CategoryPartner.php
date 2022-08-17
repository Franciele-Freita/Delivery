<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPartner extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'name',
        'status',
    ];

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function scopeIsActive($query)
    {
        $query->where('status', 1);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
