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
                    {!! Field::text('description', ['label' => 'Descripción', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                    {!! Field::number('order', ['label' => '# Orden','disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'dollar']) !!}
                    {!! Field::select('design', ['nuevo' => 'Nuevo', 'existente' => 'Existente'], null,
                        ['label' => 'Diseño', 'tpl' => 'templates/withicon'], ['icon' => 'group']) !!}
                    {!! Field::select('added', ['90' => 'Nuevo', 'existente' => 'Existente'], null,
                        ['label' => 'Existente', 'disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'group']) !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>      
@endsection
