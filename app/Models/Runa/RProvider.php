<?php

namespace App\Models\Runa;

use Illuminate\Database\Eloquent\Model;

class RProvider extends Model
{
    protected $fillable = [
    	'name', 'phone', 'rfc', 'address', 'city', 'products'
    ];

    function shoppings()
    {
        return $this->hasMany(RShopping::class, 'provider');
    }
}
