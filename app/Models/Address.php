<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'recipient',
        'type',
        'cep',
        'street',
        'number',
        'district',
        'city',
        'estate',
        'complement',
        'reference',
        'main',
    ];

    public function user()
    {
        return $this->belongsTo('Users', 'user_id', 'id');
    }
}
