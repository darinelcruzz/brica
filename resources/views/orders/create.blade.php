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
                    {!! Field::text('description', ['label' => 'Descripción', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('order', ['label' => '# Orden','disabled' => '', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('design', ['nuevo' => 'Nuevo', 'existente' => 'Existente'],
                        ['label' => 'Diseño', 'template' => 'templates/mytemplate1']) !!}
                   {!! Field::select('added', ['90' => 'Nuevo', 'existente' => 'Existente'],
                        ['label' => 'Existente', 'disabled' => '', 'template' => 'templates/mytemplate1']) !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Ordenar', ['class' => 'btn btn-info btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
