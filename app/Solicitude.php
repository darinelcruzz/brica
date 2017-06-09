<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    protected $fillable = ['client', 'description', 'team', 'total', 'status', 
    'quantity1', 'material1', 'price1', 'amount1',
    'quantity2', 'material2', 'price2', 'amount2',
    'quantity3', 'material3', 'price3', 'amount3',
    'quantity4', 'material4', 'price4', 'amount4',
    ];
}
