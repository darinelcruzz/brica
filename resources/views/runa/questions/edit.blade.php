@extends('runa')

@section('main-content')

    <row-woc col="col-md-6">
        <solid-box title="Crear pregunta" color="box-warning">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.question.update', 'class' => 'form-horizontal']) !!}
                {!! Field::text('body', $rquestion->body, ['tpl' => 'templates/oneline', 'ph' => 'El cuerpo de la pregunta ¿ ... ?']) !!}
                {!! Field::select('type', ['Sí/No', 'Rango/Caritas'], [$rquestion->type],
                    ['tpl' => 'templates/oneline', 'empty' => '¿Qué tipo de respuestas tendrá la pregunta?']) !!}
                <input type="hidden" name="id" value="{{ $rquestion->id }}">
                <input type="checkbox" name="reset"> ¿Resetear respuestas?
                {!! Form::submit('Modificar', ['class' => 'btn btn-warning pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
