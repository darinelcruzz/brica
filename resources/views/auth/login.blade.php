@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio de sesión</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'login', 'class' => 'form-horizontal']) !!}
                        {!! Field::text('email', ['label' => 'Usuario', 'value' => old('user'), 'tpl' => 'templates/oneline']) !!}
                        {!! Field::password('password', ['tpl' => 'templates/oneline']) !!}

                        {!! Form::submit('Entrar', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
