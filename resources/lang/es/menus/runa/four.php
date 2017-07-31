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
        ]
    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'engineer' => [
                'title' => 'Ingenieros',
                'route' => 'runa.engineer'
            ],

            'designs' => [
                'title' => 'Diseños',
                'route' => 'runa.designs'
            ],
        ]
    ],

    'operators' => [
        'title' => 'Operadores',
        'icon' => 'fa fa-cogs',
        'route' => 'runa.operator',
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
