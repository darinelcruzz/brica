@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva orden: {{ $quotation }}</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'production.store']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('type', 
                                ['maquila' => 'Maquíla', 'produccion' => 'Producción'], null,
                                ['tpl' => 'templates/withicon'], ['icon' => 'industry']) 
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('description',['tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('design', ['nuevo' => 'Nuevo', 'existente' => 'Existente'], null,
                            ['tpl' => 'templates/withicon', 'v-model' => 'selected'], ['icon' => 'wrench']) !!}
                        </div>
                        <div v-if="disable(selected)" class="col-md-6">
                            {!! Field::select('added', ['placa molino' => 'Placa molino', 'tapa' => 'Tapa'], null,
                            ['tpl' => 'templates/withicon'], ['icon' => 'check-square-o']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::select('caliber',
                                        ['16' => '16', '15' => '15', '14' => '14', '12' => '12', '10' => '10', '3/16' => '3/16"', '1/4' => '1/4"', 'ANT 12' => 'ANT 12', 'ANT 1/4' => 'ANT 1/4"'], null,
                                    ['tpl' => 'templates/withicon'], ['icon' => 'compress']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::select('measureType', ['externas' => 'Externas', 'internas' => 'Internas'], null,
                                        ['tpl' => 'templates/withicon'], ['icon' => 'external-link']
                                    ) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::number('pieces',
                                        ['tpl' => 'templates/withicon', 'step' => '1'], ['icon' => 'list']
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
                                ['tpl' => 'templates/iconatend', 'step' => '0.01', 'min' => '0'],
                                ['icon' => 'arrows-v', 'unit' => 'cm']
                            ) !!}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            {!! Field::number('length',
                                ['tpl' => 'templates/iconatend', 'step' => '0.01', 'min' => '0'],
                                ['icon' => 'arrows-h', 'unit' => 'cm']
                            ) !!}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            {!! Field::number('width',
                                ['tpl' => 'templates/iconatend', 'step' => '0.01', 'min' => '0'],
                                ['icon' => 'expand', 'unit' => 'cm']
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
        <div class="col-md-3">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Equipos</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
