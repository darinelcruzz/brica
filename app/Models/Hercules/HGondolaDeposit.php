<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HGondolaDeposit extends Model
{
    protected $fillable = ['amount', 'description', 'gondola_id'];

    function gondola()
    {
        return $this->belongsTo(HGondola::class, 'gondola_id');
    }

    function scopeMonthBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . '-01 00:00:00', $date . '-31 23:59:59' ])
                    ->get();
    }

    function scopeTodayBalance($query, $date)
    {
        return $query->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:59' ])
                    ->get();
    }
}
