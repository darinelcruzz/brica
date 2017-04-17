@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['method' => 'POST', 'route' => 'order.create']) !!}
                {!! Field::select('team', ['1' => 'Luis y Jorge', '2' => 'Pepe y Romeo'], ['label' => 'Equipo']) !!}
                {!! Field::select('client', ['1' => 'Jose Luis Perez', '2' => 'Pepe y Romeo'], ['label' => 'Cliente']) !!}
                {!! Field::number('weight', null, ['label' => 'Peso', 'step' => 1]) !!}
                {!! Field::text('date', ['label' => 'Fecha']) !!}
                {!! Field::select('provider', ['1' => 'Aceros del Grijalva', '2' => 'Aceros Rey'], ['label' => 'Proveedor']) !!}
                {!! Field::number('amount', ['label' => 'Importe']) !!}
                {!! Field::number('items', ['label' => 'Partidas']) !!}
                {!! Form::submit('Agregar') !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
