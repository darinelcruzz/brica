@extends('hercules')

@section('main-content')

    <row-woc col="col-md-4">
        <solid-box title="Agregar foto a la orden {{ $order->receiptr->id }}" color="box-primary">
            {!! Form::open([
                'method' => 'POST', 'route' => 'hercules.photo.upload', 'enctype' => 'multipart/form-data']) !!}
                <input type="file" name="file" required>
                <input type="hidden" name="order" value="{{ $order->id }}">
                {!! Form::submit('Subir', ['class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
