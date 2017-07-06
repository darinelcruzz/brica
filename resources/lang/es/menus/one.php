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

    'quotations' => [
        'title' => 'Cotizaciones',
        'icon' => 'fa fa-calculator',
        'submenu' => [
            'create' => [
                'title' => 'Terminado',
                'route' => 'quotation.create'
            ],
            'make' => [
                'title' => 'Producción',
                'route' => 'quotation.make'
            ],
            'show' => [
                'title' => 'Cajera',
                'route' => 'quotation.show'
            ],
        ]
    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'pending' => [
                'title' => 'Gerente',
                'route' => 'production.manager'
            ],
            'status' => [
                'title' => 'Ingeniero',
                'route' => 'production.production'
            ],
            'designs' => [
                'title' => 'Agregar diseño',
                'route' => 'design.form'
            ],
        ]
    ],

    'administration' => [
        'title' => 'Administración',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'cash' => [
                'title' => 'Caja',
                'route' => 'quotation.cash'
            ],
            'expenses' => [
                'title' => 'Gastos',
                'route' => 'expense.create'
            ],
        ]
    ],

    'products' => [
        'title' => 'Productos',
        'icon' => 'fa fa-barcode',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'product.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'product.show'
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
        'route' => 'production.operator',
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
