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
            'engineer' => [
                'title' => 'Ingenieros',
                'route' => 'runa.engineer'
            ],
            'manager' => [
                'title' => 'Gerente',
                'route' => 'runa.manager'
            ],
        ]
    ],

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'cash' => [
                'title' => 'Balance',
                'route' => 'runa.index'
            ],
            'expenses' => [
                'title' => 'Gastos',
                'route' => 'runa.expenses'
            ],
        ]
    ],

    'inventory' => [
        'title' => 'Inventario',
        'icon' => 'fa fa-archive',
        'route' => 'runa.item.index'
    ],

    'clients' => [
        'title' => 'Clientes',
        'icon' => 'fa fa-user',
        'submenu' => [
            'add' => [
                'title' => 'Agregar',
                'route' => 'runa.client.create'
            ],
            'index' => [
                'title' => 'Lista',
                'route' => 'runa.client.index'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
