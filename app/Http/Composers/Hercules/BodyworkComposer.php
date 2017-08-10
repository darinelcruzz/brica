<?php

namespace App\Http\Composers\Hercules;

use Illuminate\View\View;
use App\Models\Hercules\HItem;

class BodyworkComposer
{
    public function compose(View $view)
    {
        $view->processes = [
            'welding' => 'soldadura',
            'anchoring' => 'fondeo',
            'clothing' => 'vestido',
            'painting' => 'pintura',
            'mounting' => 'montaje'
        ];
        $view->items = $this->getItems();
    }

    function getItems()
    {
        $welding = HItem::all()->filter(function ($item) {
            return strpos($item->family, 'soldadura');
        })->pluck('description', 'id')->toArray();

        $anchoring = HItem::all()->filter(function ($item) {
            return strpos($item->family, 'fondeo');
        })->pluck('description', 'id')->toArray();

        $clothing = HItem::all()->filter(function ($item) {
            return strpos($item->family, 'vestido');
        })->pluck('description', 'id')->toArray();

        $painting = HItem::all()->filter(function ($item) {
            return strpos($item->family, 'pintura');
        })->pluck('description', 'id')->toArray();

        $mounting = HItem::all()->filter(function ($item) {
            return strpos($item->family, 'montaje');
        })->pluck('description', 'id')->toArray();

        return [
            'welding' => $welding,
            'anchoring' => $anchoring,
            'clothing' => $clothing,
            'painting' => $painting,
            'mounting' => $mounting
        ];
    }
}
