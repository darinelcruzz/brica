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
        'deliver', 'observations', 'process', 'location', 'model', 'created_at',
        'printer', 'print_date'
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
        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->whereBetween('h_receipts.created_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
            ->where('h_orders.status', '!=', 'cancelada')
            ->selectRaw("h_receipts.id, client, type, retainer, amount")
            ->get();
    }

    function scopePaidToday($query, $date)
    {
        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->whereBetween('h_orders.updated_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
            ->where('h_orders.status', 'pagado')
            ->selectRaw("h_receipts.id, client, type, retainer, amount")
            ->get();
    }

    function scopeMonthBalance($query, $date)
    {
        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->whereBetween('h_receipts.created_at', [$date . '-01 00:00:00', $date . '-31 23:59:59' ])
            ->selectRaw("h_receipts.id, h_receipts.created_at as date, client, type, retainer, amount")
            ->get();
    }

    function scopePaidThisMonth($query, $date)
    {
        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->whereBetween('h_orders.updated_at', [$date . '-01 00:00:00', $date . '-31 23:59:59' ])
            ->where('h_orders.status', 'pagado')
            ->selectRaw("h_receipts.id, h_orders.updated_at as date, h_orders.status, client, type, retainer, amount")
            ->get();
    }

    function scopeReceiptsFromDateToDate($query, $startDate, $endDate, $monthly, $op = '=')
    {
        $format = $monthly ? 'F': 'd-M';

        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->where('h_orders.status', $op, 'pagado')
            ->whereBetween('h_orders.updated_at', [$startDate, $endDate])
            ->orderBy('h_orders.updated_at', 'asc')
            ->get()
            ->groupBy(function($item) use($format) {
                return Date::parse($item->updated_at)->format($format);
            });
    }

    function scopeBuiltBodyworks($query, $start, $end, $monthly)
    {
        $format = $monthly ? 'F': 'd-M';

        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->whereBetween("h_orders.endDate", [$start, $end])
            ->where('h_orders.bodywork', '!=', 0)
            ->orderBy("h_orders.endDate", 'asc')
            ->get()
            ->groupBy(function($item) use($format) {
                return Date::parse($item->endDate)->format($format);
            });
    }

    function scopeSoldBodyworks($query, $start, $end, $monthly)
    {
        $format = $monthly ? 'F': 'd-M';

        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->whereBetween("h_orders.updated_at", [$start, $end])
            ->where('h_orders.status', 'pagado')
            ->where('h_orders.bodywork', '!=', 0)
            ->orderBy("h_orders.updated_at", 'asc')
            ->get()
            ->groupBy(function($item) use($format) {
                return Date::parse($item->updated_at)->format($format);
            });
    }

    function scopeBuiltFromDateToDate($query, $start, $end, $monthly, $status)
    {
        $format = $monthly ? 'F': 'd-M';

        return $query->join('h_orders', 'h_receipts.id', '=', 'h_orders.receipt')
            ->where('h_orders.status', $status)
            ->where('h_orders.bodywork', '!=', 0)
            ->whereBetween('h_orders.endDate', [$start, $end])
            ->orderBy('h_orders.endDate', 'asc')
            ->get()
            ->groupBy(function($item) {
                return $item->bodyworkr->type;
            });
    }
}
