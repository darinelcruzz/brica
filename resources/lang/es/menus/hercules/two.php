<?php

return [

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-key',
        'submenu' => [
            'create' => [
                'title' => 'Balance',
                'route' => 'hercules.balance'
            ],
            'list' => [
                'title' => 'Gastos',
                'route' => 'hercules.expenses'
            ],
        ]
    ],

    'receipts' => [
        'title' => 'Recibos',
        'icon' => 'fa fa-file-text-o',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.receipt.create'
            ],
            'available' => [
                'title' => 'Disponibles',
                'route' => 'hercules.receipt.available'
            ],
            'historial' => [
                'title' => 'Lista',
                'route' => 'hercules.receipts'
            ],
        ]
    ],

    'stocksale' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-object-ungroup',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.stocksale.create'
            ],
            'list' => [
                'title' => 'Historial',
                'route' => 'hercules.stocksales'
            ],
            'items' => [
                'title' => 'Artículos',
                'route' => 'hercules.stocksales.items'
            ],
        ]
    ],

    'warehouse' => [
        'title' => 'Almacen',
        'icon' => 'fa fa-cubes',
        /*'submenu' => [
            'complete' => [
                'title' => 'Terminados',*/
                'route' => 'hercules.warehouse'
            /*],
            'incomplete' => [
                'title' => 'Semiterminados',
                'route' => 'hercules.semis'
            ],
            'all' => [
                'title' => 'Todos',
                'route' => 'hercules.warehouse.all'
            ],
        ]*/

    ],

    // Reporte ventas

    'clients' => [
        'title' => 'Clientes',
        'icon' => 'fa fa-user',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.client.create'
            ],
            'list' => [
                'title' => 'Lista',
                'route' => 'hercules.clients'
            ],
        ]
    ],

    'personnel' => [
        'title' => 'Personal',
        'icon' => 'fa fa-male',
        'route' => 'hercules.personnel'
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
