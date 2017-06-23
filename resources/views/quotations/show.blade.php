@extends('admin')

@section('main-content')

    @include('table', ['rows' => $terminated,
        'header' => ['#', 'Cliente','Monto', 'Abonado', 'Pagar'],
        'color' => 'danger', 'title' => 'Producto terminado', 'example' => '1',
        'extra' => 'templates/prepay_form'])

      @include('table', ['rows' => $paid,
        'header' => ['#', 'Cliente','Monto', 'Fecha'],
        'color' => 'success', 'title' => 'Folios pagado', 'example' => '2', 
        'collapsed' => 'collapsed'])

@endsection
