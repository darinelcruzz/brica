<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
    	'quotation', 'total_weight', 'date', 'provider',
    	'amount', 'items',
    ];
}
