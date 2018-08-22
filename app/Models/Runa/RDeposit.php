<?php

namespace App\Models\Runa;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class RDeposit extends Model
{
    protected $fillable = ['shopping', 'date', 'bank', 'account', 'amount'];

    function shoppingr()
    {
    	return $this->belongsTo(RShopping::class, 'shopping');
    }

    function getDepositDateAttribute()
    {
        $date = new Date(strtotime($this->date));
        return $date->format('D, d/m/y');
    }
}
