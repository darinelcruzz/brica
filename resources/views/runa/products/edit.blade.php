@extends('runa')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Editar producto" color="box-info">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.product.update', 'class' => 'form-horizontal']) !!}
                {!! Field::text('name', $product->name ,['tpl' => 'templates/oneline']) !!}
                {!! Field::select('unity', ['kg' => 'kg', 'cm' => 'cm', 'unidad' => 'unidad',
                    'm' => 'm', 'pieza' => 'pieza'], [$product->unity],
                    ['tpl' => 'templates/oneline', 'empty' => false]) !!}
                {!! Field::number('price',  $product->price, ['tpl' => 'templates/oneline', 'step'=>'0.01']) !!}
                {!! Field::text('family',  $product->family, ['tpl' => 'templates/oneline']) !!}
                {!! Field::number('quantity',  $product->quantity, ['tpl' => 'templates/oneline']) !!}
                <input type="hidden" name="id" value="{{ $product->id }}">
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-info pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
