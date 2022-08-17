<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estates extends Model
{
    use HasFactory;
    protected $fillable = [
        'cod_uf',
        'name',
        'uf',
        'region',
    ];

    public function region()
    {
        return $this->belongsTo(Regions::class, 'region', 'id' );
    }


    public function cities()
    {
        return $this->hasMany(City::class, 'uf', 'uf');
    }
}
