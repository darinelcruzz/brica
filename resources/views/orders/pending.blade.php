@extends('admin')

@section('main-content')

    @include('table', ['rows' => $pending,
        'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Pago'],
        'color' => 'danger', 'title' => 'Órdenes pendientes', 'example' => '1',
        'extra' => 'templates/prepay_form'])

    @include('table', ['rows' => $authorized,
        'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Anticipo'],
        'color' => 'warning', 'title' => 'Órdenes autorizadas', 'example' => '2',
        'extra' => 'no existe'])

    @include('table', ['rows' => $terminated,
        'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Piezas', 'Inicio', 'Final'],
        'color' => 'success', 'title' => 'Órdenes finalizadas', 'example' => '3',
        'extra' => 'no existe'])

@endsection
