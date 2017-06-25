@extends('admin')

@section('main-content')

    @include('table', ['rows' => $pending,
            'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo','Fecha entrega', 'Autorizar'],
            'color' => 'danger', 'title' => 'Órdenes pendientes', 'example' => '1',
            'extra' => 'templates/toassign'])

    @include('table', ['rows' => $authorized,
            'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Fecha entrega'],
            'color' => 'danger', 'title' => 'Órdenes en cola', 'example' => '2', 'collapsed' => 'collapsed'])

    @include('table', ['rows' => $production,
            'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Inicio',],
            'color' => 'warning', 'title' => 'Órdenes en producción', 'example' => '3'])

    @include('table', ['rows' => $terminated,
                'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Piezas', 'Inicio', 'Final'],
                'color' => 'success', 'title' => 'Órdenes finalizadas', 'example' => '4', 'collapsed' => 'collapsed'])

@endsection
