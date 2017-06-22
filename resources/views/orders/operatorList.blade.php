@extends('admin')

@section('main-content')

    @include('table', ['rows' => $pending,
            'header' => ['#', 'Cliente', 'Tipo', 'Descripción', 'Equipo','Fecha entrega', 'Empezar'],
            'color' => 'danger', 'title' => 'Órdenes pendientes', 'example' => '1',
            'extra' => 'templates/toproduction'])

@endsection