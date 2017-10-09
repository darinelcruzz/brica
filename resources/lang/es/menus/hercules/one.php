<?php

return [

    'receipts' => [
        'title' => 'Recibos',
        'icon' => 'fa fa-file-text-o',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.receipt.create'
            ],
            'list' => [
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
                'title' => 'Lista',
                'route' => 'hercules.stocksales'
            ],
        ]
    ],

    'warehouse' => [
        'title' => 'Almacen',
        'icon' => 'fa fa-cubes',
        'submenu' => [
            'complete' => [
                'title' => 'Terminados',
                'route' => 'hercules.warehouse'
            ],
            'incomplete' => [
                'title' => 'Semiterminados',
                'route' => 'hercules.semis'
            ],
            'all' => [
                'title' => 'Todos',
                'route' => 'hercules.warehouse.all'
            ],
        ]

    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-cogs',
        'submenu' => [
            'works' => [
                'title' => 'Pendientes',
                'route' => 'hercules.production'
            ],
            'finished' => [
                'title' => 'Terminados',
                'route' => 'hercules.production.done'
            ],
        ]
    ],

    'articles' => [
        'title' => 'Artículos',
        'icon' => 'fa fa-list-ol',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.item.create'
            ],
            'list' => [
                'title' => 'Lista',
                'route' => 'hercules.items'
            ],
        ]
    ],

    'bodyworks' => [
        'title' => 'Carrocerías',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.bodywork.create'
            ],
            'list' => [
                'title' => 'Lista',
                'route' => 'hercules.bodyworks'
            ],
        ]
    ],

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
