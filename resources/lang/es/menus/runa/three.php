<?php

return [

    'quotations' => [
        'title' => 'Cotizaciones',
        'icon' => 'fa fa-calculator',
        'submenu' => [
            'terminated' => [
                'title' => 'Terminado',
                'route' => 'runa.quotationt.create'
            ],
            'production' => [
                'title' => 'Producción',
                'route' => 'runa.quotationp.create'
            ],
            'charge' => [
                'title' => 'Cobrar ticket',
                'route' => 'runa.cashier'
            ],
            'finished' => [
                'title' => 'Generar ticket',
                'route' => 'runa.cashier.finished'
            ],
        ]
    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'manager' => [
                'title' => 'Gerente',
                'route' => 'runa.manager'
            ],
            'productivity' => [
                'title' => 'Productividad',
                'route' => 'runa.manager.productivity'
            ],
            'cuts' => [
                'title' => 'Cortes',
                'route' => 'runa.cut.index'
            ],
            'results' => [
                'title' => 'Resultados',
                'route' => 'runa.manager.results'
            ],
            'designs' => [
                'title' => 'Diseños',
                'route' => 'runa.design.index'
            ],
        ]
    ],

    'inventory' => [
        'title' => 'Inventario',
        'icon' => 'fa fa-archive',
        'route' => 'runa.item.index'
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
