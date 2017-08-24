<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

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
}
