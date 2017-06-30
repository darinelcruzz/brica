<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['description', 'amount', 'date', 'user'];

    public function scopeTotalExpenses($query, $date)
	{
		return $query->where('date', $date)->sum('amount');
	}
}
