<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseStatusReference extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
    ];

    public function PurchaseStatus()
    {
        return $this->hasMany(PurchaseStatus::class);
    }
}
