<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'unity', 'price', 'family', 'quantity'
    ];

    function getFormattedPriceAttribute()
    {
        return '$ ' . number_format($this->price, 2, '.', ',');
    }

    function getLabel($quantity)
    {
        $string = ucwords(strtolower($this->name));

        foreach (array('-', '\'') as $delimiter) {
          if (strpos($string, $delimiter) !== false) {
            $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
          }
        }

        return $string . " ($quantity $this->unity)";
    }
}
