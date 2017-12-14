<?php

return [

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-key',
        'submenu' => [
            'daily' => [
                'title' => 'Balance diario',
                'route' => 'hercules.balance.index'
            ],
            'monthly' => [
                'title' => 'Balance mensual',
                'route' => 'hercules.balance.monthly'
            ],
            'list' => [
                'title' => 'Gastos',
                'route' => 'hercules.balance.expenses'
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
                'route' => 'hercules.receipt.index'
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
                'route' => 'hercules.bodywork.trucks'
            ],
            'trailer' => [
                'title' => 'Remolques',
                'route' => 'hercules.bodywork.trailers'
            ],
            'dry' => [
                'title' => 'Cajas secas',
                'route' => 'hercules.bodywork.dry'
            ],
            'soda' => [
                'title' => 'Cajas refresqueras',
                'route' => 'hercules.bodywork.soda'
            ],
            'platform' => [
                'title' => 'Plataformas',
                'route' => 'hercules.bodywork.platform'
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

    'providers' => [
        'title' => 'Proveedores',
        'icon' => 'fa fa-handshake-o',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'hercules.provider.create'
            ],
            'list' => [
                'title' => 'Lista',
                'route' => 'hercules.provider.index'
            ],
        ]
    ],

    'personnel' => [
        'title' => 'Personal',
        'icon' => 'fa fa-male',
        'route' => 'hercules.personnel.index'
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
                'route' => 'hercules.user.index'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
