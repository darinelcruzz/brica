<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
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
}
