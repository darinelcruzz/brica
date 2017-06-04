<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    protected $fillable = ['client', 'total', 'status', 'team'];
}
