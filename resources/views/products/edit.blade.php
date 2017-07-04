@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Producto</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'product.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $product->name ,['tpl' => 'templates/oneline']) !!}
                        {!! Field::select('unity', ['kg' => 'kg', 'cm' => 'cm', 'unidad' => 'unidad',
                            'm' => 'm', 'pieza' => 'pieza'],
                            null,['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('price',  $product->price, ['tpl' => 'templates/oneline', 'step'=>'0.01']) !!}
                        {!! Field::text('family',  $product->family, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('quantity',  $product->quantity, ['tpl' => 'templates/oneline']) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-info btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
