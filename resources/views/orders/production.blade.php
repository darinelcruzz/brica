@extends('admin')

@section('main-content')

    @include('table', ['rows' => $authorized,
        	'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'A producción'],
        	'color' => 'danger', 'title' => 'Órdenes en cola', 'example' => '1',
        	'extra' => 'templates/toproduction'])

    @include('table', ['rows' => $production,
        	'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Inicio', '¿Terminado?'],
        	'color' => 'warning', 'title' => 'Órdenes en producción', 'example' => '2',
        	'extra' => 'templates/orderfinished'])

    @include('table', ['rows' => $terminated,
        		'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Piezas', 'Inicio', 'Final'],
            	'color' => 'success', 'title' => 'Órdenes finalizadas', 'example' => '3'])

@endsection
