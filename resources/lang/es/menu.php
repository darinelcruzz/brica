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
            'history' => [
                'title' => 'Historial',
                'route' => 'order.show'
            ],
        ]
    ]
];
