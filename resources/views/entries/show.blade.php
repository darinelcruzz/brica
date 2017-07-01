@extends('admin')

@section('main-content')
<div class="row">
    @include('table', ['rows' => $entries,
            'header' => ['#','Cot', 'Proveedor', 'Fecha', 'Peso', 'Importe'],
            'color' => 'warning', 'title' => 'Listado de entradas', 'example' => '1'
            ])
</div>
@endsection
