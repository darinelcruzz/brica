<?php

namespace App\Models\Runa;

use Illuminate\Database\Eloquent\Model;

class RQuestion extends Model
{
    protected $fillable = ['body', 'type', 'answers'];

    function getAllAnswersAttribute()
    {
        return unserialize($this->answers);
    }
}
