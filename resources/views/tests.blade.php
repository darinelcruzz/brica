@extends('admin')

@section('main-content')
    <row-woc col="col-md-5">
        <solid-box title="Nueva Cotización">
            {{ $test->client->name }}
        </solid-box>
    </row-woc>

@endsection
