@extends('admin')

@section('main-content')
<div class="row">
    @include('table', ['rows' => $terminated,
        'header' => ['#', 'Cliente','Monto', 'Pagar'],
        'color' => 'danger', 'title' => 'Producto terminado', 'example' => '1',
        'extra' => 'templates/topay'])

      @include('table', ['rows' => $paid,
        'header' => ['#', 'Cliente','Monto', 'Fecha'],
        'color' => 'success', 'title' => 'Folios pagado', 'example' => '2', 
        'collapsed' => 'collapsed'])
</div>
@endsection
