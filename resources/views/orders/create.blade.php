@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva orden de trabajo</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'order.store']) !!}
                <div class="box-body">
                    {!! Field::select('team', ['1' => 'Luis y Jorge', '2' => 'Pepe y Romeo'], null,
                        ['label' => 'Equipo', 'tpl' => 'templates/withicon'], ['icon' => 'group']) !!}
                    {!! Field::select('client', ['1' => 'Molinos de Chiapas', '2' => 'Monsanto', '3' => 'Carrocerias Aguilar'], null,
                        ['label' => 'Cliente', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                    {!! Field::date('date', ['label' => 'Fecha', 'tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                    {!! Field::number('amount', ['label' => 'Importe', 'tpl' => 'templates/withicon'], ['icon' => 'dollar']) !!}
                    {!! Field::number('items', ['label' => 'Partidas', 'tpl' => 'templates/withicon'], ['icon' => 'paper-plane-o']) !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--
    <!--div class="row">
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
    </div>--}}
@endsection
