<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HClient;
use App\Models\Hercules\HOrder;
use Jenssegers\Date\Date;

class HReceipt extends Model
{
    protected $fillable = [
        'client', 'bodywork', 'retainer', 'amount', 'color',
        'deliver', 'observations'
    ];

    function clientr()
    {
        return $this->belongsTo(HClient::class, 'client');
    }

    function bodyworkr()
    {
        return $this->belongsTo(HBodywork::class, 'bodywork');
    }

    function order()
	{
		return $this->hasOne(HOrder::class, 'receipt');
	}

    function getDeliverDateAttribute()
    {
        $date = Date::createFromFormat('Y-m-d', $this->deliver);
        return $date->format('l, d F Y');
    }

    function getFormattedRetainerAttribute()
    {
        return '$ ' . number_format($this->retainer, 2, '.', ',');
    }

    function getFormattedAmountAttribute()
    {
        return '$ ' . number_format($this->amount, 2, '.', ',');
    }

    function getRestAttribute()
    {
        return '$ ' . number_format($this->amount - $this->retainer, 2, '.', ',');
    }
}
