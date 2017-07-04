@extends('admin')

@section('main-content')
<div class="row">
    @include('table', ['rows' => $providers,
            'header' => ['#', 'Nombre', 'RFC', 'Ciudad', 'Teléfono', 'Correo', 'Contacto', ''],
            'color' => 'warning', 'title' => 'Proveedores', 'example' => '1', 'extra' => 'templates/toedit'
            ])
</div>
@endsection
