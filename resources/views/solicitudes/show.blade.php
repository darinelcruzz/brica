@extends('admin')

@section('main-content')

    @include('table', ['rows' => $clients,
            'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Total'],
            'color' => 'danger', 'title' => 'Órdenes pendientes', 'example' => '1'
            ])
@endsection