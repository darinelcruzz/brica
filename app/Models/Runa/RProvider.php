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

    function getTotalDebtAttribute()
    {
    	$total = 0;
        $shoppings = RShopping::where('provider', $this->id)
            ->whereRaw('DATE_FORMAT(date, "%Y") =' . date('Y'))
            ->get();

        foreach ($shoppings as $shopping) {
            $total += $shopping->pending;
    	}

    	return $total;
    }

    function getTotalAmountAttribute()
    {
    	$total = 0;
        $shoppings = RShopping::where('provider', $this->id)
            ->whereRaw('DATE_FORMAT(date, "%Y") =' . date('Y'))
            ->get();

    	foreach ($shoppings as $shopping) {
            $total += $shopping->amount;
    	}

    	return $total;
    }

    function getTotalPaidAttribute()
    {
    	$total = 0;
        $shoppings = RShopping::where('provider', $this->id)
            ->whereRaw('DATE_FORMAT(date, "%Y") =' . date('Y'))
            ->get();

    	foreach ($shoppings as $shopping) {
            $total += $shopping->amount - $shopping->pending;
    	}

    	return $total;
    }
}
