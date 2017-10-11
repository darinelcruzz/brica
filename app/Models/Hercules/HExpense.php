<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HExpense extends Model
{
    protected $guarded = [];

    function scopeTodayBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
                    ->get();
    }

    function scopeTodayTotal($query, $date)
    {
        return $query->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
                    ->sum('amount');
    }
}
