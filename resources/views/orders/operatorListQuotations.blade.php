@extends('admin')

@section('main-content')

    @include('table', ['rows' => $pending,
            'header' => ['#', 'Tipo', 'Descripción','Fecha entrega', 'Empezar'],
            'color' => 'danger', 'title' => 'Trabajos pendientes', 'example' => '1',
            'extra' => 'templates/toproduction'])

@endsection
