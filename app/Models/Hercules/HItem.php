<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HItem extends Model
{
    protected $guarded = [];

    function getProcessesAttribute()
    {
      $processes = '';
      if(!unserialize($this->family)) {
          return '<code>no se especificó un proceso</code>';
      }
      foreach (unserialize($this->family) as $process) {
        $processes .= "$process, ";
      }
      return substr($processes, 0, -2);
    }

    function addProcesses($processes)
    {
      $this->update(['family' => serialize($processes)]);
    }

    function getFormattedPriceAttribute()
    {
        return '$ ' . number_format($this->price, 2, '.', ',');
    }
}
