<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uf',
    ];

    public function Cities()
    {
        return $this->hasMany(City::class);
    }
}
