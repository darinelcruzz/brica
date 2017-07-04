<?php

return [
    'entries' => [
        'title' => 'Entradas',
        'icon' => 'fa fa-truck',
        'route' => 'entries.show',
    ],

    'quotations' => [
        'title' => 'Cotizaciones',
        'icon' => 'fa fa-calculator',
        'submenu' => [
            'create' => [
                'title' => 'Terminado',
                'route' => 'quotation.create'
            ],
            'make' => [
                'title' => 'Producción',
                'route' => 'quotation.make'
            ],
            'show' => [
                'title' => 'Cajera',
                'route' => 'quotation.show'
            ],
        ]
    ],

    'orders' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'pending' => [
                'title' => 'Gerente',
                'route' => 'production.pending'
            ],
            'status' => [
                'title' => 'Ingeniero',
                'route' => 'production.production'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
