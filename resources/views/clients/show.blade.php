@extends('admin')

@section('main-content')

    @include('table', ['rows' => $clients,
            'header' => ['#', 'Nombre', 'RFC', 'Ciudad', 'Teléfono', 'Correo', 'Contacto'],
            'color' => 'warning', 'title' => 'Clientes', 'example' => '1'
            ])

@endsection
