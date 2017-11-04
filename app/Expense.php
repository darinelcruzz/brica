<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['description', 'amount', 'date', 'user'];

    function scopeTotalExpenses($query, $date)
	{
		return $query->where('date', $date)->sum('amount');
	}

    function scopeMonthBalance($query, $date)
    {
        return $query->whereBetween('date', [$date . '-01 00:00:00', $date . '-31 23:59:59' ])
                    ->get();
    }
}
