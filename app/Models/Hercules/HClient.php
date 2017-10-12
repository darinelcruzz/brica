<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HClient extends Model
{
    protected $guarded = [];

    function receipts()
    {
        return $this->hasMany(HReceipt::class, 'client');
    }
}
