<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HClient;
use App\Models\Hercules\HOrder;

class HReceipt extends Model
{
    protected $fillable = [
        'client', 'bodywork', 'retainer', 'color',
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
}
