<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HClient;
use App\Models\Hercules\HOrder;
use Jenssegers\Date\Date;

class HReceipt extends Model
{
    protected $fillable = [
        'client', 'other', 'type', 'bodywork', 'retainer', 'amount', 'color',
        'deliver', 'observations', 'process'
    ];

    function clientr()
    {
        return $this->belongsTo(HClient::class, 'client');
    }

    function bodyworkr()
    {
        return $this->belongsTo(HBodywork::class, 'bodywork');
    }

    function order()
	{
		return $this->hasOne(HOrder::class, 'receipt');
	}

    function getNameAttribute()
    {
        $name = $this->client == 2 ? $this->other: $this->clientr->name;
        return $name == null ? 'Otro': $name;
    }

    function getSerialNumberAttribute()
	{
        $order = HOrder::where('receipt', $this->id)->first();
        return $order ? $order->serial_number: '';
	}

    function getDeliverDateAttribute()
    {
        $date = Date::createFromFormat('Y-m-d', $this->deliver);
        return $date->format('d F Y');
    }

    function getFormattedRetainerAttribute()
    {
        return '$ ' . number_format($this->retainer, 2);
    }

    function getFormattedAmountAttribute()
    {
        return '$ ' . number_format($this->amount, 2);
    }

    function getRestAttribute()
    {
        return '$ ' . number_format($this->amount - $this->retainer, 2);
    }

    function getBalanceAttribute()
    {
        if ($this->order) {
            if ($this->order->status != 'pagado') {
                return $this->retainer;
            }
            return $this->amount;
        }
        return 0;
    }

    function scopeTodayBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
                    ->get();
    }

    function scopeFromDateToDate($query, $startDate, $endDate)
    {
        return $query//->whereBetween('created_at', [$startDate, $endDate])
            ->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            //->select('h_receipts.amount', 'h_receipts.retainer', 'h_receipts.created_at', 'h_orders.status')
            //->selectRaw('h_receipts.amount, h_receipts.retainer, h_receipts.created_at')
            ->whereBetween('h_receipts.created_at', [$startDate, $endDate])
            ->selectRaw('amount, retainer, DATE_FORMAT(h_receipts.created_at, "%Y-%m-%d") as date, h_orders.status')
            //->groupBy('date')
			//->pluck('sum', 'day');
            ->get();
    }
}
