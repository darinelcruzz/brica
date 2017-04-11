@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['method' => 'POST', 'route' => 'entries.store']) !!}
                {!! Field::number('quotation', ['label' => 'Cotización']) !!}
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
