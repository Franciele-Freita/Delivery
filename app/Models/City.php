<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'cod',
        'name',
        'uf',
    ];

    public function estate()
    {
        return $this->belongsTo(Estates::class, 'id', 'region')->paginate(10)->get();
    }


}
