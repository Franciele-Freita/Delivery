<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalUserData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'birth_date',
        'cpf',
        'celphone',
        'telphone',
        'genre',
    ];

    public function User()
    {
        return $this->haOne(User::class);
    }


}
