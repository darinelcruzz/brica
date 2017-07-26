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
        ]
    ],

    'cashier' => [
        'title' => 'Cajera',
        'icon' => 'fa fa-money',
        'submenu' => [
            'index' => [
                'title' => 'Cobrar',
                'route' => 'runa.cashier'
            ],
        ],
    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'terminated' => [
                'title' => 'Ingenieros',
                'route' => 'runa.engineer'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
