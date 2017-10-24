<?php

return [

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
                'route' => 'hercules.stocksale.index'
            ],
            'inventory' => [
                'title' => 'Artículos',
                'route' => 'hercules.item.stocksales'
            ],
        ]
    ],

    'inventory' => [
        'title' => 'Inventario',
        'icon' => 'fa fa-archive',
        'route' => 'hercules.item.inventory'
    ],

    'warehouse' => [
        'title' => 'Almacen',
        'icon' => 'fa fa-cubes',
        /*'submenu' => [
            'complete' => [
                'title' => 'Terminados',*/
                'route' => 'hercules.warehouse.index'
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

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-cogs',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.receipt.create'
            ],
            'working' => [
                'title' => 'En proceso',
                'route' => 'hercules.production.index'
            ],
            'finished' => [
                'title' => 'Finalizadas',
                'route' => 'hercules.production.finished'
            ],
        ]
    ],

    // Reportes producción

    'bodyworks' => [
        'title' => 'Carrocerías',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'truck' => [
                'title' => 'Redilas',
                'route' => 'hercules.bodywork.trucks'
            ],
            'trailer' => [
                'title' => 'Remolques',
                'route' => 'hercules.bodywork.trailers'
            ],
            'items' => [
                'title' => 'Artículos',
                'route' => 'hercules.item.bodyworks'
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
                'route' => 'hercules.client.index'
            ],
        ]
    ],

    'personnel' => [
        'title' => 'Personal',
        'icon' => 'fa fa-male',
        'route' => 'hercules.personnel.index'
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
