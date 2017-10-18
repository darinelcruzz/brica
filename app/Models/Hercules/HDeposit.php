<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HDeposit extends Model
{
    protected $guarded = [];

    function receiptr()
    {
        return $this->belongsTo(HReceipt::class, 'receipt');
    }

    function getClientAttribute()
    {
        return $this->receiptr->clientr->name;
    }

    function scopeRestToPay($query, $receipt)
    {
        return $query->where('receipt', $receipt)
                ->sum('amount');
    }

    function scopeMonthBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . '-01 00:00:00', $date . '-31 23:59:59' ])
                    ->get();
    }

    function scopeTodayBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
                    ->get();
    }
}
