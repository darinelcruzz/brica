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
