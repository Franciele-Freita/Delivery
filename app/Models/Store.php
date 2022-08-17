<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
        protected $fillable = [
        'partner_id',
        'address_id',
        'partner',
        'cpf',
        'cnpj',
        'corporate_name',
        'fantasy_name',
        'telephone',
        'branch_of_activity',
        'image_store',
        'store_banner',
        'status',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class)->IsActive();
    }

    public function addresses()
    {
        return $this->belongsTo(Address_partner::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categories()
    {
        return $this->hasMany(CategoryPartner::class, 'store_id', 'id');
    }
    public function scopeIsOpen($query)
    {
        $query->where('status', 1);
    }

    public function notes()
    {
       return $this->hasMany(Note::class);
    }

    public function purchases()
    {
       return $this->hasMany(Purchase::class);
    }






}
