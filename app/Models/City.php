<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'estate_id',
    ];

    public function Estate()
    {
        return $this->hasOne(Estate::class , 'id', 'estate_id');
    }
}
