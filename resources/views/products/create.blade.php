@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo Producto</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'product.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('unity', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('price', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('family', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('quantity', ['tpl' => 'templates/oneline']) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-info btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
