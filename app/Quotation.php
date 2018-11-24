<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Notifications\Notifiable;

class Quotation extends Model
{
	use Notifiable;
	
	protected $fillable = [
		'type', 'folio', 'client', 'status', 'description', 'team', 'startTime', 'endTime',
		'amount', 'date_payment', 'payment_date', 'notified', 'pay', 'deliver', 'products', 'weight'
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
        return '$ ' . number_format($this->amount, 2);
    }

	function getBalanceAttribute()
	{
		return $this->sale ? $this->sale->amount: $this->amount;
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

	public function scopeMonthBalance($query, $date)
    {
        return $query->where('status', '!=', 'pendiente')
			->where('status', '!=', 'cancelado')
			->where('status', '!=', 'credito')
			->whereBetween('created_at', [$date . '-01 00:00:00', $date . '-31 23:59:59' ])
			->get();
    }

    public function scopeInBalanceReport($query, $startDate, $endDate)
    {
        return $query->whereBetween('date_payment', [$startDate, $endDate])
        	->where('status', '!=', 'pendiente')
			->where('status', '!=', 'cancelado')
			->where('status', '!=', 'credito')
			->selectRaw('date_payment, amount, id, DATE_FORMAT(date_payment, "%Y-%m-%d") as date')
			->orderBy('date', 'asc')
			->get()
			->groupBy('date');
    }

	public function scopeReportSales($query, $startDate, $endDate)
    {
        return $query->whereBetween('payment_date', [$startDate, $endDate])
			->where('status', '!=', 'pendiente')
			->where('status', '!=', 'cancelado')
			->where('status', '!=', 'credito')
			->orderBy('payment_date')
			->get(['id', 'amount', 'payment_date']);
    }

    public function scopeSalesByMonth($query, $startDate, $endDate)
    {
        return $query->whereBetween('payment_date', [$startDate, $endDate])
			->where('status', '!=', 'pendiente')
			->where('status', '!=', 'cancelado')
			->where('status', '!=', 'credito')
			->orderBy('payment_date')
			->get()
			->groupBy(function($item) {
    			return Date::parse($item->payment_date)->format('F');
    		});
    }

	function scopeMadeByTeam($query, $team, $startDate, $endDate)
	{
		return $query->whereBetween('created_at', [$startDate, $endDate])
					->where('team', $team)
					->where('status', '!=', 'cancelado')
					->get();
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
