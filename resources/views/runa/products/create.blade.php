@extends('runa')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Agregar producto" color="box-info">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.product.store', 'class' => 'form-horizontal']) !!}
                {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                {!! Field::select('unity', ['kg' => 'kg', 'cm' => 'cm', 'unidad' => 'unidad',
                    'm' => 'm', 'pieza' => 'pieza'],
                    null,['tpl' => 'templates/oneline']) !!}
                {!! Field::number('price', ['tpl' => 'templates/oneline', 'step'=>0.01]) !!}
                {!! Field::text('family', ['tpl' => 'templates/oneline']) !!}
                {!! Field::number('quantity', ['tpl' => 'templates/oneline']) !!}
                {!! Form::submit('Agregar', ['class' => 'btn btn-info pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
