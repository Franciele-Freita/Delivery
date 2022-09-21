<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description',
        'payment_nfe_id',
    ];

    public function Purchases()
    {
        return $this->hasMany(Purchase::class, 'payment_id', 'id');
    }

    public function PaymentReference()
    {
        return $this->hasOne(PaymentMethodReferenceNfe::class, 'id', 'payment_reference_nfe_id');
    }
}
