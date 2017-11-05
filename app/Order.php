<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use App\Models\Runa\RCut;

class Order extends Model
{
    protected $fillable = ['quotation', 'type', 'order', 'deliverDate',
    'description', 'team', 'design','added', 'caliber', 'measureType',
    'pieces', 'height','length', 'width', 'client'
    ];

    function cuts()
    {
        return $this->hasMany(RCut::class);
    }

    public function getCreationDateAttribute()
    {
        $date = new Date($this->created_at);
        return $date->format('D j \d\e F\, Y');
    }

    public function scopeSelectedOrders($query, $status, $extra = [])
    {
        $select = ['id', 'client', 'type', 'description'];

        foreach($extra as $col) {
            array_push($select, $col);
        }

        return $query->select($select)
            ->where('status', $status)->get();
    }
}
