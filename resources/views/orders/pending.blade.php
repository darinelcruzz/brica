@extends('admin')

@section('main-content')

    @include('table', ['rows' => $pending,
            'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo','Fecha entrega', 'Autorizar'],
            'color' => 'danger', 'title' => 'Órdenes pendientes', 'example' => '1',
            'extra' => 'templates/authorize'])

    @include('table', ['rows' => $authorized,
            'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo'],
            'color' => 'warning', 'title' => 'Órdenes en cola', 'example' => '2'])

    @include('table', ['rows' => $terminated,
            'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Piezas', 'Inicio', 'Final'],
            'color' => 'success', 'title' => 'Órdenes finalizadas', 'example' => '3'])

@endsection
