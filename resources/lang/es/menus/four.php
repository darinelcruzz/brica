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
            'charge' => [
                'title' => 'Cobrar producción',
                'route' => 'quotation.finished'
            ],
        ]
    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'status' => [
                'title' => 'Ingeniero',
                'route' => 'production.engineers'
            ],
            'designs' => [
                'title' => 'Agregar diseño',
                'route' => 'design.form'
            ],
        ]
    ],

    'operators' => [
        'title' => 'Operadores',
        'icon' => 'fa fa-cogs',
        'route' => 'production.operator',
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
