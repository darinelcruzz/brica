@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva orden de trabajo</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'order.store', 'class' => 'form-horizontal']) !!}
                <div class="box-body">
                    {!! Field::select('team', ['1' => 'Luis y Jorge', '2' => 'Pepe y Romeo'],
                        ['label' => 'Equipo', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('client', ['1' => 'Jose Luis Perez', '2' => 'Pepe y Romeo'],
                        ['label' => 'Cliente', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('weight', null, ['label' => 'Peso', 'step' => 1, 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::date('date', ['label' => 'Fecha', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('provider', ['1' => 'Aceros del Grijalva', '2' => 'Aceros Rey'],
                        ['label' => 'Proveedor', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('amount', ['label' => 'Importe', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('items', ['label' => 'Partidas', 'template' => 'templates/mytemplate1']) !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-info pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
