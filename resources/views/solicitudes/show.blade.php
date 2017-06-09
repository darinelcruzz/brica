@extends('admin')

@section('main-content')

    @include('table', ['rows' => $solicitudes,
            'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Total'],
            'color' => 'danger', 'title' => 'Órdenes de venta pendientes', 'example' => '1'
            ])
@endsection