@extends('runa')

@section('main-content')

    <row-woc col="col-md-6">
        <solid-box title="Editar usuario" color="box-warning">
            {!! Form::open(['method' => 'POST', 'route' => ['runa.user.update', $user], 'class' => 'form-horizontal']) !!}
                {!! Field::text('name', $user->name,  ['label' => 'Nombre', 'tpl' => 'templates/oneline']) !!}
                {!! Field::text('email', $user->email,  ['label' => 'Usuario', 'tpl' => 'templates/oneline']) !!}
                {!! Field::select('level',
                    ['1' => 'Admin', '2' => 'Ventas', '3' => 'Gerente', '4' => 'Ingeniero', '5' => 'Operador'], [$user->level],
                    ['label' => 'Jerarquía', 'template' => 'templates/oneline', 'empty' => 'Selecione nivel']) !!}
                {!! Field::password('password', ['label' => 'Contraseña', 'tpl' => 'templates/oneline']) !!}
                {!! Field::password('password_confirmation', ['label' => 'Repetir contraseña', 'tpl' => 'templates/oneline']) !!}
                <hr>
                {!! Form::submit('EDITAR', ['class' => 'btn btn-warning pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
