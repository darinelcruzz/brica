<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HClient;

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
}
