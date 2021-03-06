@extends('hercules')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Nueva venta" color="box-primary">

            {!! Form::open(['method' => 'POST', 'route' => 'hercules.receipt.store']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('client', $clients, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione el cliente', 'v-model' => 'hclient'], ['icon' => 'address-card-o']) !!}
                    </div>
                    <div class="col-md-6">
                        <template v-if="hclient == 2">
                            {!! Field::text('other', ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        </template>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('type',
                            ['redila' => 'Redila', 'remolque' => 'Remolque', 'seca' => 'Cajas secas', 'refresco' => 'Cajas refresqueras', 'plataforma' => 'Plataforma', 'caja' => 'Cajas', 'garrafonera' => 'Góndolas garrafoneras', 'reparacion' => 'Reparación'],
                            null, ['tpl' => 'templates/withicon',
                            'empty' => 'Tipo de trabajo', 'v-model' => 'htype'], ['icon' => 'anchor']) !!}
                    </div>
                    <div class="col-md-6">
                        <template v-if="htype == 'remolque'">
                            {!! Field::number('charge', ['tpl' => 'templates/withicon', 'step' => '0.1', 'min' => '0'], ['icon' => 'balance-scale']) !!}
                        </template>
                        <template v-if="htype == 'reparacion'">
                            {!! Field::select('process', ['soldadura'=> 'Soldadura', 'fondeo'=> 'Fondeo', 'vestido'=> 'Vestido', 'pintura'=> 'Pintura', 'montaje'=> 'Montaje'],
                                null, ['tpl' => 'templates/withicon', 'empty' => 'Enviar a'], ['icon' => 'product-hunt']) !!}
                        </template>
                    </div>
                </div>

                <div v-if="htype != 'reparacion'" class="row">
                    <div v-if="htype == 'redila'" class="col-md-6">
                        {!! Field::select('bodywork', $trucks, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería'], ['icon' => 'truck']) !!}
                    </div>
                    <div v-if="htype == 'remolque'" class="col-md-6">
                        {!! Field::select('bodywork', $trailers, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería'], ['icon' => 'truck']) !!}
                    </div>
                    <div v-if="htype == 'seca'" class="col-md-6">
                        {!! Field::select('bodywork', $dry, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería'], ['icon' => 'truck']) !!}
                    </div>
                    <div v-if="htype == 'refresco'" class="col-md-6">
                        {!! Field::select('bodywork', $soda, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería'], ['icon' => 'truck']) !!}
                    </div>
                    <div v-if="htype == 'plataforma'" class="col-md-6">
                        {!! Field::select('bodywork', $platforms, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería'], ['icon' => 'truck']) !!}
                    </div>
                    <div v-if="htype == 'caja'" class="col-md-6">
                        {!! Field::select('bodywork', $boxes, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería'], ['icon' => 'truck']) !!}
                    </div>
                    <div v-if="htype == 'garrafonera'" class="col-md-6">
                        {!! Field::select('bodywork', $gondolas, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería'], ['icon' => 'truck']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('color', ['tpl' => 'templates/withicon'], ['icon' => 'paint-brush']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::number('amount', ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'usd']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::number('retainer', 0, ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'money']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::date('deliver', $today, ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('model', ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('observations', ['tpl' => 'templates/withicon'], ['icon' => 'eye']) !!}
                    </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" value="{{ auth()->user()->name }}" name="printer">
                    <input type="hidden" value="{{ date('Y-m-d') }}" name="print_date">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
