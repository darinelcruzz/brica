@extends('admin')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Subir diseño" color="box-info">
            {!! Form::open([
                'method' => 'POST', 'route' => 'design.upload', 'enctype' => 'multipart/form-data']) !!}
                {!! Field::text('name') !!}
                <input type="file" name="file" required>
                <input type="hidden" name="type" value="{{ $type }}">
                {!! Form::submit('Agregar', ['class' => 'btn btn-info pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
