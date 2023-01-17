<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
    	'name', 'address', 'phone',
    	'email', 'contact', 'rfc', 'city',
        'credit', 'folio', 'discount'
    ];

    function quotations()
    {
        return $this->hasMany(Quotation::class, 'client');
    }

    function getUppercaseNameAttribute()
    {
        $string = ucwords(strtolower($this->name));

        foreach (array('-', '\'') as $delimiter) {
          if (strpos($string, $delimiter) !== false) {
            $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
          }
        }

        return $string;
    }

    function getMoneyMadeAttribute()
    {
        $total = 0;
        foreach ($this->quotations as $quotation) {
            $total += $quotation->sale ? $quotation->sale->amount: $quotation->amount;
        }

        return $total;
    }

    function getMoney($startDate, $endDate)
    {
        $quotations = $this->quotations;

        $total = 0;
        foreach ($quotations as $quotation) {
            if ($quotation->payment_date > $startDate && $quotation->payment_date < $endDate) {
                $total += $quotation->sale ? $quotation->sale->amount: $quotation->amount;
            }
        }

        return $total;
    }
}
