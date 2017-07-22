<?php

return [
    'articles' => [
        'title' => 'Artículos',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'create' => [
                'title' => 'Crear',
                'route' => 'item.create'
            ],
            'history' => [
                'title' => 'Lista',
                'route' => 'item.index'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
