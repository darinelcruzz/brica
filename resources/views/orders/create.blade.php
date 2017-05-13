@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva orden de trabajo</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'order.store', 'class' => 'form-horizontal']) !!}
                <div class="box-body">
                    {!! Field::select('team', ['1' => 'Luis y Jorge', '2' => 'Pepe y Romeo'],
                        ['label' => 'Equipo', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('client', ['1' => 'Molinos de Chiapas', '2' => 'Monsanto', '3' => 'Carrocerias Aguilar'],
                        ['label' => 'Cliente', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::date('date', ['label' => 'Fecha', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('amount', ['label' => 'Importe', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('items', ['label' => 'Partidas', 'template' => 'templates/mytemplate1']) !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Siguiente     ', ['class' => 'btn btn-info btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">1</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'order.store', 'class' => 'form-horizontal']) !!}
                <div class="box-body">
                    {!! Field::select('design', ['1' => 'Nuevo', '2' => 'Guardado'],['label' => 'Diseño', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('caliber', ['1' => '12', '2' => '14', '3' => '1/2"', '4' => '1"'],
                            ['label' => 'Calibre', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('measure', ['label' => 'Medida', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('quantity', ['label' => 'Cantidad', 'template' => 'templates/mytemplate1']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">2</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'order.store', 'class' => 'form-horizontal']) !!}
                <div class="box-body">
                    {!! Field::select('design', ['1' => 'Nuevo', '2' => 'Guardado'],['label' => 'Diseño', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('caliber', ['1' => '12', '2' => '14', '3' => '1/2"', '4' => '1"'],
                            ['label' => 'Calibre', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('measure', ['label' => 'Medida', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('quantity', ['label' => 'Cantidad', 'template' => 'templates/mytemplate1']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
