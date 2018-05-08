<?php

namespace App\Models\Runa;

use Illuminate\Database\Eloquent\Model;
use App\User;

class RCut extends Model
{
    protected $guarded = [];

    function team()
    {
        return $this->belongsTo(User::class);
    }

    function scopeMonthBalance($query, $date)
    {
        return $query->where('updated_at', '>', $date . '-01 00:00:00')
                    ->where('updated_at', '<', $date . '-31 23:59:59')
                    ->where('order_id', 0)
                    ->where('amount', '>', 0)
                    ->get();
    }
}
