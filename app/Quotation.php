<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
	protected $fillable = ['type', 'client', 'status', 'description', 'amount', 'date_payment', 'pay', 'deliver'];

	public function clientr()
    {
    	return $this->belongsTo(Client::class, 'client');
    }

	public function orders()
    {
    	return $this->hasMany(Order::class, 'quotation');
    }

	public function scopeTotalPaid($query, $date)
	{
		return $query->where('date_payment', $date)
			->where('status', '!=', 'pendiente')
			->sum('amount');
	}

	public function scopeProduction($query, $status)
    {
        return $query->where('type', 'produccion')->where('status', $status)->get();
    }

	public function scopeTerminated($query, $status)
	{
		return $query->where('type', 'terminado')->where('status', $status)->get();
	}
}
