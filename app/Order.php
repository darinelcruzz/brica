<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['team', 'description', 'order', 'design',
    'added', 'caliber','measure', 'pieces', 'height', 'long', 'width',
    'client', 'type', 'estimated',
    ];

    public function getCreationDateAttribute()
    {
        $date = new Date($this->created_at);
        return $date->format('D j \d\e F\, Y');
    }

    public function scopeSelectedOrders($query, $status, $extra = [])
    {
        $select = ['id', 'client', 'type', 'description', 'team'];
        
        foreach($extra as $col) {
            array_push($select, $col);
        }

        return $query->select($select)
            ->where('status', $status)->get();
    }
}
