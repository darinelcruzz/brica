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
        $welding = HItem::where('type', 'carroceria')->get()->filter(function ($item) {
            return strpos($item->family, 'soldadura');
        });

        $anchoring = HItem::where('type', 'carroceria')->get()->filter(function ($item) {
            return strpos($item->family, 'fondeo');
        });

        $clothing = HItem::where('type', 'carroceria')->get()->filter(function ($item) {
            return strpos($item->family, 'vestido');
        });

        $painting = HItem::where('type', 'carroceria')->get()->filter(function ($item) {
            return strpos($item->family, 'pintura');
        });

        $mounting = HItem::where('type', 'carroceria')->get()->filter(function ($item) {
            return strpos($item->family, 'montaje');
        });

        return [
            'welding' => $welding,
            'anchoring' => $anchoring,
            'clothing' => $clothing,
            'painting' => $painting,
            'mounting' => $mounting
        ];
    }
}
