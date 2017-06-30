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

	public function scopeSelectedQuotations($query, $status, $extra = [])
    {
        $select = ['id', 'client', 'description', 'orders'];

        foreach($extra as $col) {
            array_push($select, $col);
        }

        return $query->select($select)
            ->where('type', 'produccion')->where('status', $status)->get();
    }

	function client()
    {
    	return $this->belongsTo(Client::class);
    }
}
