<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $view->main = trans('menu.main');
    }
}
