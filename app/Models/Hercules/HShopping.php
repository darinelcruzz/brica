<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class HShopping extends Model
{
    protected $fillable = [
        'provider', 'date', 'product', 'unit_price', 'quantity', 'unity', 'status'
    ];

    function getShopDateAttribute()
    {
        $date = new Date(strtotime($this->date));
        return $date->format('D, d/m/y');
    }

    function getAmountAttribute()
    {
        return $this->unit_price * $this->quantity;
    }

    function getPendingAttribute()
    {
        return $this->amount - $this->payments->sum('amount');
    }

    function payments()
    {
        return $this->hasMany(HPayment::class, 'shopping');
    }
}
