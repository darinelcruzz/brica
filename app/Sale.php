<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Sale extends Model
{
    protected $fillable = [
        'quotation', 'retainer', 'amount'
    ];

    public function quotationr()
    {
    	return $this->belongsTo(Quotation::class, 'quotation');
    }

    public function scopeTotalPaid($query, $date)
	{
		return $query->where('created_at', $date)
			->sum('amount');
	}

    function getSaleDateAttribute()
    {
        $date = Date::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return $date->format('d/M/Y h:i a');
    }

    function getSaleTotalAttribute()
    {
        if ($this->quotationr->type  == 'produccion')
            return '$ ' . number_format($this->amount - $this->retainer, 2, '.', ',');
        return '$ ' . number_format($this->amount, 2, '.', ',');
    }
}
