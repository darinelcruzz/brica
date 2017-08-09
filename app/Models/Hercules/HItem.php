<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;

class HItem extends Model
{
    protected $guarded = [];

    function getProcessesAttribute()
    {
      $processes = '';
      foreach (unserialize($this->family) as $process) {
        $processes .= "$process, ";
      }
      return substr($processes, 0, -2);
    }

    function addProcesses($processes)
    {
      $this->update(['family' => serialize($processes)]);
    }
}
