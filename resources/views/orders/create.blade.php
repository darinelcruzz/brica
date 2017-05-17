@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva orden de trabajo</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'order.store']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('team', 
                                ['H1' => 'H1', 'H2' => 'H2', 'H3' => 'H3'], null,
                                ['label' => 'Equipo', 'tpl' => 'templates/withicon'], ['icon' => 'group']
                            ) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('description', 
                                ['label' => 'Descripción', 'tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('order', 10 ,['label' => '# Orden' ,'disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                        </div>

                        <div class="col-md-6">
                            {!! Field::select('design', ['nuevo' => 'Nuevo', 'existente' => 'Existente'], null,
                            ['label' => 'Diseño', 'tpl' => 'templates/withicon'], ['icon' => 'wrench']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('added', ['90' => 'Nuevo', 'existente' => 'Existente'], null,
                            ['label' => 'Existente', 'disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'check-square-o']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::select('caliber', 
                                        ['16' => '16', '15' => '15', '14' => '14', '12' => '12', '10' => '10', '3/16' => '3/16"', '1/4' => '1/4"', 'ANT 12' => 'ANT 12', 'ANT 1/4' => 'ANT 1/4"'], null,
                                    ['label' => 'Calibre', 'tpl' => 'templates/withicon'], ['icon' => 'compress']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::text('measure', 
                                        ['label' => 'Medida', 'tpl' => 'templates/withicon'], ['icon' => 'arrows']
                                    ) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::number('pieces', 
                                        ['label' => 'Piezas', 'tpl' => 'templates/withicon', 'step' => '1'], ['icon' => 'list']
                                    ) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" align="center">
                            <div class="row">
                                <img height="80%" width="80%" src="{{ asset('/img/nuevo.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            {!! Field::number('height', 
                                ['label' => 'Alto', 'tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'arrows-v']
                            ) !!}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            {!! Field::number('long', 
                                ['label' => 'Largo', 'tpl' => 'templates/withicon', 'step' => '0.01', 'step' => '0.01'], ['icon' => 'arrows-h']
                            ) !!}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            {!! Field::number('width', 
                                ['label' => 'Ancho', 'tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'expand']
                            ) !!}
                        </div>
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
