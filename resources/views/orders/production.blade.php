@extends('admin')

@section('main-content')

    @include('table', ['rows' => $authorized,
        	'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo'],
        	'color' => 'danger', 'title' => 'Órdenes en cola', 'example' => '1'])

    @include('table', ['rows' => $production,
        	'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Inicio',],
        	'color' => 'warning', 'title' => 'Órdenes en producción', 'example' => '2'])

    @include('table', ['rows' => $terminated,
        		'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo', 'Piezas', 'Inicio', 'Final'],
            	'color' => 'success', 'title' => 'Órdenes finalizadas', 'example' => '3'])

@endsection
