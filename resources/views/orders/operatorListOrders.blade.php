@extends('admin')

@section('main-content')

    @include('table', ['rows' => $pending,
            'header' => ['#', 'Tipo', 'Descripción'],
            'color' => 'danger', 'title' => 'Órdenes pendientes', 'example' => '1'])

@endsection