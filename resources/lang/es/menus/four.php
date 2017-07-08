<?php

return [

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
                'title' => 'Cobrar anticipo/terminado',
                'route' => 'quotation.show'
            ],
            'charge' => [
                'title' => 'Cobrar producción',
                'route' => 'quotation.finished'
            ],
        ]
    ],

    'operators' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'route' => 'production.operator',
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
