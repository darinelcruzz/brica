@extends('runa')

@section('main-content')

    <row-woc col="col-md-6">
        <solid-box title="Crear pregunta" color="box-warning">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.question.store', 'class' => 'form-horizontal']) !!}
                {!! Field::text('body', ['tpl' => 'templates/oneline', 'ph' => 'El cuerpo de la pregunta ¿ ... ?']) !!}
                {!! Field::select('type', ['Sí/No', 'Rango/Caritas'], null,
                    ['tpl' => 'templates/oneline', 'empty' => '¿Qué tipo de respuestas tendrá la pregunta?']) !!}
                {!! Form::submit('Agregar', ['class' => 'btn btn-warning pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
