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
                'title' => 'Crear',
                'route' => 'order.create'
            ],
            'pending' => [
                'title' => 'Pendientes',
                'route' => 'order.pending'
            ],
            'history' => [
                'title' => 'Historial',
                'route' => 'order.show'
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
    ]
];
