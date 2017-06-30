@extends('admin')

@section('main-content')
    <row-woc col="col-md-5">
        <solid-box title="Nueva Cotización">
            @foreach (unserialize($test->products) as $key => $value)
                {{ $key }}
            @endforeach

        </solid-box>
    </row-woc>

@endsection
