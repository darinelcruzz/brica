<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Quotation extends Model
{
	protected $fillable = [
		'type', 'client', 'status', 'description', 'team', 'startTime', 'endTime',
		'amount', 'date_payment', 'pay', 'deliver', 'products'
	];

	public function clientr()
    {
    	return $this->belongsTo(Client::class, 'client');
    }

	public function orders()
    {
    	return $this->hasMany(Order::class, 'quotation');
    }

	public function sale()
	{
		return $this->hasOne(Sale::class, 'quotation');
	}

	function getRetainerAttribute()
    {
        return '$ ' . number_format($this->amount, 2, '.', ',');
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

	public function scopeInBalance($query, $date)
    {
        return $query->where('status', '!=', 'pendiente')
			->where('status', '!=', 'cancelado')
			->where('status', '!=', 'credito')
			->where('date_payment', $date)
			->get();
    }

	public function scopeTeamReport($query, $team)
    {
        return $query->where('status', '!=', 'pendiente')
			->where('status', '!=', 'cancelado')
			->where('status', '!=', 'credito')
			->where('team', $team)
			->sum('amount');
    }

	public function storeProducts($request)
	{
		$products = [];

        for ($i = 0; $i < count($request->quantity); $i++) {
            $product = [];

            if($request->quantity[$i] > 0) {
                $product['quantity'] =  $request->quantity[$i];
                $product['material'] =  $request->material[$i];
                $product['total'] =  $request->total[$i];
                array_push($products, $product);
            }
        }

        $this->products = serialize($products);
        $this->amount = $this->amount * (1 - $this->clientr->discount/100);

        $this->save();
	}

	public function storeAsCredit($status, $amount)
    {
        $this->update([
            'status' => $status,
            'amount' => $amount,
            'date_payment' => Date::now()->format('Y-m-d')
        ]);
    }
}
