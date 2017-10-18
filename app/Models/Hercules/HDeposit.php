<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HDeposit extends Model
{
    protected $guarded = [];

    function scopeRestToPay($query, $receipt)
    {
        return $query->where('receipt', $receipt)
                ->sum('amount');
    }
}
