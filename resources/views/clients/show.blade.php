@extends('admin')

@section('main-content')

<div class="row">
    @include('table', ['rows' => $clients,
            'header' => ['#', 'Nombre', 'RFC', 'Ciudad', 'Teléfono', 'Correo', 'Contacto', ''],
            'color' => 'warning', 'title' => 'Clientes', 'example' => '1', 'extra' => 'templates/toedit'
            ])
</div>
@endsection
