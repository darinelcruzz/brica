<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HBodywork extends Model
{
    protected $fillable = [
        'description', 'family', 'length', 'width',
        'height', 'welding', 'anchoring', 'clothing',
        'paiting', 'mounting', 'price'
    ];
}
