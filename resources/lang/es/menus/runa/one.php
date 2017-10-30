<?php

return [

    'quotations' => [
        'title' => 'Cotizaciones',
        'icon' => 'fa fa-calculator',
        'submenu' => [
            'terminated' => [
                'title' => 'Terminado',
                'route' => 'runa.quotationt.create'
            ],
            'production' => [
                'title' => 'Producción',
                'route' => 'runa.quotationp.create'
            ],
            'charge' => [
                'title' => 'Cobrar ticket',
                'route' => 'runa.cashier'
            ],
            'finished' => [
                'title' => 'Generar ticket',
                'route' => 'runa.cashier.finished'
            ],
        ]
    ],

    'production' => [
        'title' => 'Producción',
        'icon' => 'fa fa-industry',
        'submenu' => [
            'engineer' => [
                'title' => 'Ingenieros',
                'route' => 'runa.engineer'
            ],
            'manager' => [
                'title' => 'Gerente',
                'route' => 'runa.manager'
            ],
            'designs' => [
                'title' => 'Diseños',
                'route' => 'runa.designs'
            ],
        ]
    ],

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-eye',
        'submenu' => [
            'cash' => [
                'title' => 'Caja',
                'route' => 'runa.cash'
            ],
            'expenses' => [
                'title' => 'Gastos',
                'route' => 'runa.expenses'
            ],
            'manage' => [
                'title' => 'Eliminar',
                'route' => 'runa.manage'
            ],
        ]
    ],

    'reports' => [
        'title' => 'Reportes',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'productivity' => [
                'title' => 'Equipos',
                'route' => 'runa.report.teams'
            ],
            'sales' => [
                'title' => 'Ventas',
                'route' => 'runa.report.sales'
            ],
            'clients' => [
                'title' => 'Clientes',
                'route' => 'runa.report.clients'
            ],
            'products' => [
                'title' => 'Productos',
                'route' => 'runa.report.products'
            ],
        ]
    ],

    'questions' => [
        'title' => 'Preguntas',
        'icon' => 'fa fa-question-circle-o',
        'submenu' => [
            'index' => [
                'title' => 'Lista',
                'route' => 'runa.question.index'
            ],
            'create' => [
                'title' => 'Crear',
                'route' => 'runa.question.create'
            ],
            'answer' => [
                'title' => 'Cuestionario',
                'route' => 'runa.question.answer'
            ],
        ]
    ],

    'clients' => [
        'title' => 'Clientes',
        'icon' => 'fa fa-user',
        'submenu' => [
            'add' => [
                'title' => 'Agregar',
                'route' => 'runa.client.create'
            ],
            'index' => [
                'title' => 'Lista',
                'route' => 'runa.client.index'
            ],
        ]
    ],

    'products' => [
        'title' => 'Productos',
        'icon' => 'fa fa-barcode',
        'submenu' => [
            'add' => [
                'title' => 'Agregar',
                'route' => 'runa.product.create'
            ],
            'index' => [
                'title' => 'Lista',
                'route' => 'runa.product.index'
            ],
        ]
    ],

    'inventory' => [
        'title' => 'Inventario',
        'icon' => 'fa fa-archive',
        'route' => 'runa.item.index'
    ],

    'users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-key',
        'submenu' => [
            'add' => [
                'title' => 'Agregar',
                'route' => 'runa.user.create'
            ],
            'index' => [
                'title' => 'Lista',
                'route' => 'runa.user.index'
            ],
        ]
    ],

    'operators' => [
        'title' => 'Operadores',
        'icon' => 'fa fa-cogs',
        'route' => 'runa.operator.index',
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
