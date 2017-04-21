<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'team', 'client', 'weight', 'date', 'provider',
    	'amount', 'items',
    ];
}
