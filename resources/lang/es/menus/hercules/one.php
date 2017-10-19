<?php

return [

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-key',
        'submenu' => [
            'daily' => [
                'title' => 'Balance diario',
                'route' => 'hercules.balance'
            ],
            'monthly' => [
                'title' => 'Balance mensual',
                'route' => 'hercules.balance.monthly'
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
            'historial' => [
                'title' => 'Lista',
                'route' => 'hercules.receipts'
            ],
            'available' => [
                'title' => 'Disponibles',
                'route' => 'hercules.receipt.available'
            ],
            'deposits' => [
                'title' => 'Abonar',
                'route' => 'hercules.receipt.deposits'
            ],
            'sold' => [
                'title' => 'Vendidas',
                'route' => 'hercules.receipt.sold'
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
            'inventory' => [
                'title' => 'Artículos',
                'route' => 'hercules.stocksales.items'
            ],
        ]
    ],

    'inventory' => [
        'title' => 'Inventario',
        'icon' => 'fa fa-archive',
        'route' => 'hercules.stocksales.items.inventory'
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
                'route' => 'hercules.production'
            ],
            'finished' => [
                'title' => 'Finalizadas',
                'route' => 'hercules.production.finished'
            ],
        ]
    ],

    'reports' => [
        'title' => 'Reportes',
        'icon' => 'fa fa-bar-chart',
        'submenu' => [
            'sales' => [
                'title' => 'Ventas',
                'route' => 'hercules.report.sales'
            ],
        ]
    ],

    'bodyworks' => [
        'title' => 'Carrocerías',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'truck' => [
                'title' => 'Redilas',
                'route' => 'hercules.bodyworks.trucks'
            ],
            'trailer' => [
                'title' => 'Remolques',
                'route' => 'hercules.bodyworks.trailers'
            ],
            'items' => [
                'title' => 'Artículos',
                'route' => 'hercules.bodyworks.items'
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

    'users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.user.create'
            ],
            'list' => [
                'title' => 'Lista',
                'route' => 'hercules.users'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
