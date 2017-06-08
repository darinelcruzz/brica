@extends('admin')

@section('main-content')

    @include('table', ['rows' => $entries,
            'header' => ['#','Cot', 'Proveedor', 'Fecha', 'Peso', 'Importe'],
            'color' => 'warning', 'title' => 'Listado de entradas', 'example' => '1'
            ])

@endsection
