<?php

return [
    'entries' => [
        'title' => 'Entradas',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'entries.create'
            ],
            'history' => [
                'title' => 'Historial',
                'route' => 'entries.show'
            ],
        ]
    ],

    'orders' => [
        'title' => 'Órdenes',
        'icon' => 'fa fa-sticky-note',
        'submenu' => [
            'create' => [
                'title' => 'Crear O. Producción',
                'route' => 'order.create'
            ],
            'history' => [
                'title' => 'Historial',
                'route' => 'order.show'
            ],
            'pending' => [
                'title' => 'Gerente',
                'route' => 'order.pending'
            ],
            'status' => [
                'title' => 'Status',
                'route' => 'order.production'
            ],
        ]
    ],

    'sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'createP' => [
                'title' => 'Cobrar',
                'route' => 'sale.show'
            ],
            'status' => [
                'title' => 'Status Ordenes',
                'route' => 'order.cashier'
            ],
        ]
    ],

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'createP' => [
                'title' => 'Diario',
                'route' => 'sale.create'
            ],
            'status' => [
                'title' => 'Status',
                'route' => 'order.cashier'
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

    'providers' => [
        'title' => 'Proveedores',
        'icon' => 'fa fa-handshake-o',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'provider.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'provider.show'
            ],
        ]
    ],

    'users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-key',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'user.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'user.show'
            ],
        ]
    ],

    'operators' => [
        'title' => 'Operadores',
        'icon' => 'fa fa-industry',
        'route' => 'order.operator',
    ],
];
