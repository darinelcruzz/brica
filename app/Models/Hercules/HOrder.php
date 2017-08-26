<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class HOrder extends Model
{
    protected $guarded = [];

    function bodyworkr()
    {
    	return $this->belongsTo(HBodywork::class, 'bodywork');
    }

    function receiptr()
    {
    	return $this->belongsTo(HReceipt::class, 'receipt');
    }

    function getStartAttribute()
    {
        $date = Date::createFromFormat('Y-m-d H:i:s', $this->startDate);
        return $date->format('d/M/Y h:i a');
    }

    function getEndAttribute()
    {
        $date = Date::createFromFormat('Y-m-d H:i:s', $this->endDate);
        return $date->format('d/M/Y h:i a');
    }
}
