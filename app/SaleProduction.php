<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProduction extends Model
{
    protected $fillable = ['client', 'total', 'type', 'cutBoar', 'foldBoard',
    'cutProfile', 'foldProfile', 'weightBoar', 'weightProfile',
    ];
}
