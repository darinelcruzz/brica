@extends('admin')

@section('main-content')
<div class="row">
    @include('table', ['rows' => $products,
            'header' => ['#', 'Nombre', 'Unidad', 'Precio', 'Familia', 'Cantidad', ''],
            'color' => 'warning', 'title' => 'Productos', 'example' => '1', 'extra' => 'templates/toedit'
            ])
</div>
@endsection
