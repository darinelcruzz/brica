@extends('admin')

@section('main-content')

    @include('table', ['rows' => $users,
            'header' => ['#', 'Nombre', 'Usuario', 'Nivel'],
            'color' => 'warning', 'title' => 'Usuarios', 'example' => '5'
            ])

@endsection