<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
	protected $fillable = ['type', 'client', 'status', 'description', 'amount', 'date_payment'];

	public function scopeTotalPaid($query, $date)
	{
		return $query->where('date_payment', $date)->where('status', 'pagado')->sum('amount');
	}
}
