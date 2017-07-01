@extends('admin')

@section('main-content')

    @include('table', ['rows' => $pending,
            'header' => ['#', 'Cliente', 'Descripción', 'Fecha entrega'],
            'color' => 'danger', 'title' => 'Cotizaciones pendientes', 'example' => '1', 'collapsed' => 'collapsed'])

    @include('table', ['rows' => $completed,
            'header' => ['#', 'Cliente', 'Descripción', 'Fecha entrega', 'Asignar'],
            'color' => 'danger', 'title' => 'Cotizaciones no asignadas', 'example' => '2',
            'extra' => 'templates/toassign'])

    @include('table', ['rows' => $authorized,
            'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Fecha entrega'],
            'color' => 'danger', 'title' => 'Cotizaciones en cola', 'example' => '3', 'collapsed' => 'collapsed'])

    @include('table', ['rows' => $production,
            'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Inicio',],
            'color' => 'warning', 'title' => 'Cotizaciones en producción', 'example' => '4'])

    @include('table', ['rows' => $terminated,
                'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Inicio', 'Final'],
                'color' => 'success', 'title' => 'Cotizaciones finalizadas', 'example' => '5', 'collapsed' => 'collapsed'])

@endsection
