@extends('admin')

@section('main-content')
<div class="row">
    @include('table', ['rows' => $users,
            'header' => ['#', 'Nombre', 'Usuario', 'Nivel'],
            'color' => 'warning', 'title' => 'Usuarios', 'example' => '5'
            ])
</div>
@endsection