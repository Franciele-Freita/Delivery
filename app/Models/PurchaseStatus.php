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
        'commit',
    ];

    public function Purchase()
    {
        return $this->hasOne(Purchase::class);
    }
    public function Reference()
    {
        return $this->hasOne(PurchaseStatusReference::class, 'id', 'status_id');
    }



}
