<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id',
        'status_id',
    ];

    public function PurchaseStatusReference()
    {
        return $this->hasOne(Purchase::class);
    }
}
