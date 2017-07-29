<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'unity', 'price', 'family', 'quantity'
    ];

    function getFormattedPriceAttribute()
    {
        return '$ ' . number_format($this->price, 2, '.', ',');
    }
}
