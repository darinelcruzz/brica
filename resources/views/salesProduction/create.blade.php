@extends('admin')

@section('main-content')

    @include('table', ['rows' => $terminatedProduction,
            'header' => ['#', 'Cliente', 'Descripción', 'Anticipo'],
            'color' => 'danger', 'title' => 'Producción', 'example' => '1',
            'size' => '6'
    ]) 

    @include('table', ['rows' => $terminatedMaquila,
            'header' => ['#', 'Cliente', 'Descripción'],
            'color' => 'danger', 'title' => 'Maquila', 'example' => '1',
            'size' => '6'
    ]) 

@endsection
