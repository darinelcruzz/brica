@extends('hercules')

@section('main-content')

    <row-woc col="col-md-10">
        <solid-box title="Agregar usuario" color="box-primary">
            {!! Form::open(['method' => 'POST', 'route' => 'hercules.user.store', 'class' => 'form-horizontal']) !!}
                {!! Field::text('name', ['label' => 'Nombre', 'tpl' => 'templates/oneline']) !!}
                {!! Field::text('email', ['label' => 'Usuario', 'tpl' => 'templates/oneline']) !!}
                {!! Field::password('password', ['label' => 'Contraseña', 'tpl' => 'templates/oneline']) !!}
                {!! Field::password('password_confirmation', ['label' => 'Repetir contraseña', 'tpl' => 'templates/oneline']) !!}
                {!! Field::select('level',
                    ['1' => 'Admin', '2' => 'Ventas', '3' => 'Gerente', '5' => 'Operador'],
                    ['label' => 'Jerarquía', 'template' => 'templates/oneline', 'empty' => 'Selecione nivel']) !!}
                <input type="hidden" name="user" value="2">
                {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
