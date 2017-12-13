<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class HPayment extends Model
{
    protected $fillable = ['shopping', 'date', 'bank', 'account', 'amount'];

    function getPaymentDateAttribute()
    {
        $date = new Date(strtotime($this->date));
        return $date->format('D, d/m/y');
    }
}
