<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HProvider extends Model
{
    protected $fillable = [
    	'name', 'phone', 'rfc', 'address', 'city', 'products'
    ];

    function shoppings()
    {
        return $this->hasMany(HShopping::class, 'provider');
    }
}
