@extends('admin')

@section('main-content')

    @include('table', ['rows' => $status,
            'header' => ['Cot', 'Cliente', 'Orden', 'Status', 'Descripción', 'Equipo', 'Fecha Entrega'],
            'color' => 'warning', 'title' => 'Listado de entradas', 'example' => '1'
            ])

@endsection