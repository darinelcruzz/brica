<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HClient;
use Jenssegers\Date\Date;

class HStockSale extends Model
{
    protected $guarded = [];

    function clientr()
    {
        return $this->belongsTo(HClient::class, 'client');
    }

    function getNameAttribute()
    {
        $name = $this->client == 2 ? $this->other: $this->clientr->name;
        return $name == null ? 'Otro': $name;
    }

    function getAmountAttribute()
    {
        return '$ ' . number_format($this->total, 2);
    }

    function getFormattedDateAttribute()
    {
        $date = new Date($this->date);
        return $date->format('d F, Y');
    }

    function getProductsArrayAttribute()
    {
        return unserialize($this->products);
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

    function scopeFromDateToDate($query, $startDate, $endDate, $monthly = null)
    {
        if ($monthly) {
            return $query->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get()
            ->groupBy(function($item) {
                return Date::parse($item->date)->format('F');
            });
        }

        return $query->whereBetween('date', [$startDate, $endDate])
            // ->groupBy('date')
            // ->selectRaw('sum(total) as sum, DATE_FORMAT(date, "%d-%c") as day')
            // ->pluck('sum', 'day');
            ->orderBy('date')
            ->get()
            ->groupBy(function($item) {
                return Date::parse($item->date)->format('d-m');
            });
    }

    public function storeProducts($request)
	{
		$products = [];

        for ($i = 0; $i < count($request->quantity); $i++) {
            $product = [];

            if($request->quantity[$i] > 0) {
                $product['q'] =  $request->quantity[$i];
                $product['i'] =  $request->item[$i];
                $product['t'] =  $request->subtotal[$i];
                array_push($products, $product);
            }
        }

        $this->products = serialize($products);

        $this->save();
	}
}
