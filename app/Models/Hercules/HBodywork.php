<?php

namespace App\Models\Hercules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hercules\HItem;

class HBodywork extends Model
{
    protected $fillable = [
        'description', 'family', 'length', 'width',
        'height', 'welding', 'anchoring', 'clothing',
        'painting', 'mounting', 'price'
    ];

    public function computePrice($process)
    {
        $total = 0;

        if (!empty(unserialize($this->$process))) {
            foreach (unserialize($this->$process) as $id => $quantity) {
                $total += HItem::find($id)->price * $quantity;
            }
        }

        return $total;
    }

    public function computeTotal()
    {
        $processes = ['welding', 'anchoring', 'clothing', 'painting', 'mounting'];
        $total = 0;

        foreach ($processes as $process) {
            $subtotal = 0;
            if (!empty(unserialize($this->$process))) {
                foreach (unserialize($this->$process) as $id => $quantity) {
                    $subtotal += HItem::find($id)->price * $quantity;
                }
            }

            $total += $subtotal;
        }

        return $total;
    }
}
