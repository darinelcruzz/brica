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

    'warehouse' => [
        'title' => 'Almacen',
        'icon' => 'fa fa-cubes',
        'submenu' => [
            'index' => [
                'title' => 'Por surtir',
                'route' => 'hercules.warehouse'
            ],
            'inventory' => [
                'title' => 'Inventario',
                'route' => 'hercules.warehouse'
            ],
        ]
    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-cogs',
        'submenu' => [
            'works' => [
                'title' => 'Trabajos',
                'route' => 'hercules.production'
            ],
            'inventory' => [
                'title' => 'Generar ticket',
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
