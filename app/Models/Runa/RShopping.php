<?php

namespace App\Models\Runa;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class RShopping extends Model
{
    protected $fillable = [
        'provider', 'date', 'product', 'unit_price', 'kg', 'status'
    ];

    function getShopDateAttribute()
    {
        $date = new Date(strtotime($this->date));
        return $date->format('D, d/m/y');
    }
}
