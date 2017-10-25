<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HClient;
use App\Models\Hercules\HOrder;
use App\Models\Hercules\HDeposit;
use Jenssegers\Date\Date;

class HReceipt extends Model
{
    protected $fillable = [
        'client', 'other', 'type', 'bodywork', 'retainer', 'amount', 'color',
        'deliver', 'observations', 'process', 'location'
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
        return '$ ' . number_format($this->amount - $this->deposit, 2);
    }

    function getDepositAttribute()
    {
        $deposits = HDeposit::where('receipt', $this->id)->get();
        $total = 0;
        foreach ($deposits as $deposit) {
            $total += $deposit->amount;
        }
        return $total + $this->retainer;
    }

    function getBalanceAttribute()
    {
        if ($this->order) {
            if ($this->order->status != 'pagado') {
                return $this->retainer;
            }
            return $this->amount;
        }
        return $this->retainer;
    }

    function scopeTodayBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
                    ->get();
    }

    function scopeMonthBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . '-01 00:00:00', $date . '-31 23:59:59' ])
                    ->get();
    }

    function scopeRetainersFromDateToDate($query, $startDate, $endDate)
    {
        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->whereBetween('h_receipts.created_at', [$startDate, $endDate])
            ->where('h_orders.status', '!=', 'pagado')
            ->selectRaw("SUM(retainer) as sum, DATE_FORMAT(h_receipts.created_at, '%d-%m') as date")
            ->groupBy('date')
			->pluck('sum', 'date');
    }

    function scopeAmountsFromDateToDate($query, $startDate, $endDate)
    {
        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->orderBy('h_orders.updated_at', 'asc')
            ->where('h_orders.status', 'pagado')
            ->whereBetween('h_orders.updated_at', [$startDate, $endDate])
            ->selectRaw("SUM(amount) as sum, DATE_FORMAT(h_orders.updated_at, '%d-%m') as date")
            ->groupBy('date')
			->pluck('sum', 'date');
    }
}
