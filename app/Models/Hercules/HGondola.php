<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HGondolaDeposit;

class HGondola extends Model
{
    protected $fillable = ['brand', 'model', 'color', 'price', 'code', 'status', 'client_id'];

    function deposits()
    {
        return $this->hasMany(HGondolaDeposit::class, 'gondola_id');
    }

    function client()
    {
        return $this->belongsTo(HClient::class, 'client_id');
    }

    function getDebtAttribute()
    {
        return $this->price - $this->deposits->sum('amount');
    }

    function getRetainerAttribute()
    {
        return HGondolaDeposit::where('gondola_id', $this->id)
            ->where('description', 'Anticipo')
            ->pluck('amount')
            ->last();
    }
}
