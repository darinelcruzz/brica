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

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'pending' => [
                'title' => 'Gerente',
                'route' => 'production.manager'
            ],
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

    'administration' => [
        'title' => 'Administración',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'cash' => [
                'title' => 'Caja',
                'route' => 'quotation.cash'
            ],
            'expenses' => [
                'title' => 'Gastos',
                'route' => 'expense.create'
            ],
        ]
    ],

    'clients' => [
        'title' => 'Clientes',
        'icon' => 'fa fa-users',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'client.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'client.show'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
