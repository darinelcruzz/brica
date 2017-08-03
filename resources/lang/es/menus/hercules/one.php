<?php

return [
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

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
