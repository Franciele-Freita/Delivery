<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address_partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'partner_id',
        'store_id',
        'type',
        'cep',
        'street',
        'number',
        'district',
        'city',
        'state',
        'complement',
    ];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
