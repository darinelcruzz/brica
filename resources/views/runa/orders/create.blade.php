@extends('runa')

@section('main-content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva orden para la cotización {{ $quotation }}</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST',
                    'route' => 'runa.order.store', 'enctype' => 'multipart/form-data']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('type',
                                ['maquila' => 'Maquila', 'produccion' => 'Producción', 'corte' => 'Un corte'], null,
                                ['tpl' => 'templates/withicon', 'empty' => 'Escoge tipo'], ['icon' => 'industry'])
                            !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('description', ['tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('design', ['nuevo' => 'Nuevo', 'existente' => 'Existente'], null,
                            ['tpl' => 'templates/withicon', 'v-model' => 'selected', 'empty' => 'Elegir nuevo o existente'],
                            ['icon' => 'wrench']) !!}
                        </div>
                        <div v-if="disable(selected)" class="col-md-6">
                            {!! Field::select('added', $links , null,
                            ['v-model' => 'selectedDesign', 'tpl' => 'templates/withicon', 'empty' => false,],
                            ['icon' => 'check-square-o']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::text('caliber', ['tpl' => 'templates/withicon'], ['icon' => 'compress']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::select('measureType', ['externas' => 'Externas', 'internas' => 'Internas', 'segun muestra' => 'Según muestra'], null,
                                        ['tpl' => 'templates/withicon', 'empty' => false], ['icon' => 'external-link']
                                    ) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    {!! Field::number('pieces',
                                        ['tpl' => 'templates/withicon', 'step' => '1', 'min' => '1'], ['icon' => 'list']
                                    ) !!}
                                </div>
                            </div>
                        </div>
                        <div v-if="disable(selected)" class="col-md-6" align="center">
                            <div class="row">
                                <img height="80%" width="80%" :src="selectedDesign">
                            </div>
                        </div>
                        <div v-else class="col-md-6" align="center">
                            <div class="row">
                                <label>Agregar/tomar foto</label>
                                <input type="file" name="new_design" required>
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

                    {!! Field::textarea('observations', ['tpl' => 'templates/withicon', 'rows' => '3'], ['icon' => 'eye']) !!}

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="quotation" value="{{ $quotation }}">
                        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
