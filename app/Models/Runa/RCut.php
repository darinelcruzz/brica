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
}
