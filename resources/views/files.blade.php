@extends('admin')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Subir archivo">
            {!! Form::open([
                'method' => 'POST', 'route' => 'user.store',
                'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                {!! Field::file('file') !!}
                {!! Form::submit('Agregar', ['class' => 'btn btn-info btn-block']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
