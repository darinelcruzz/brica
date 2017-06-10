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
            'createO' => [
                'title' => 'Crear O. Producción',
                'route' => 'order.create'
            ],
            'createR' => [
                'title' => 'Crear O. Venta',
                'route' => 'solicitude.create'
            ],
            'status' => [
                'title' => 'Status',
                'route' => 'order.production'
            ],
            'history' => [
                'title' => 'Historial',
                'route' => 'order.show'
            ],
            'pending' => [
                'title' => 'Pendientes',
                'route' => 'order.pending'
            ],
        ]
    ],

    'sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'createP' => [
                'title' => 'Crear V. Producción',
                'route' => 'order.create'
            ],
            'pending' => [
                'title' => 'Pendientes',
                'route' => 'order.pending'
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

    'Providers' => [
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

    'Users' => [
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

    'Operators' => [
        'title' => 'Operadores',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'operator' => [
                'title' => 'Ver',
                'route' => 'order.operator'
            ],

        ]
    ],
];
