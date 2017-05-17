<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'team', 'description', 'order', 'design', 'added', 'caliber','measure', 'pieces', 'height', 'long', 'width',
    ];
}
