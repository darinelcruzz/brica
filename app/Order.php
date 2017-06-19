<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['quotation', 'type', 'order', 'deliverDate', 
    'description', 'team', 'design','added', 'caliber', 'measureType', 
    'pieces', 'height','length', 'width', 'client' 
    ];
}
