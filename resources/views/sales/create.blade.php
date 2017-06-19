@extends('admin')

@section('main-content')

    {!! Form::open(['method' => 'POST', 'route' => 'saleProduction.prepare']) !!}
        @include('table', ['rows' => $terminatedProduction,
                'header' => ['#', 'Cliente', 'Descripción', 'Anticipo', '<i class="fa fa-check" aria-hidden="true"></i>'],
                'color' => 'danger', 'title' => 'Producción', 'example' => '7',
                'size' => '6', 'extra' => 'templates/order_check',
                'button' => 'Siguiente'
        ])
    {!! Form::close() !!}

    @include('table', ['rows' => $terminatedMaquila,
            'header' => ['#', 'Cliente', 'Descripción'],
            'color' => 'danger', 'title' => 'Maquila', 'example' => '7',
            'size' => '6'
    ])

@endsection
