<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'quotation', 'retainer', 'amount'
    ];

    public function quotationr()
    {
    	return $this->belongsTo(Quotation::class, 'quotation');
    }
}
