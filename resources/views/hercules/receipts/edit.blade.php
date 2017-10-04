@extends('hercules')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Modificar para crear venta" color="box-primary">

            {!! Form::open(['method' => 'POST', 'route' => 'hercules.receipt.update']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('client', $clients, null, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione el cliente', 'v-model' => 'hclient'], ['icon' => 'address-card-o']) !!}
                        <template v-if="hclient == 2">
                            {!! Field::text('other', ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        </template>
                    </div>

                    <div class="col-md-6">
                        {!! Field::select('bodywork', $bodyworks, $hreceipt->bodywork, ['tpl' => 'templates/withicon',
                            'empty' => 'Seleccione una carrocería', 'disabled'], ['icon' => 'truck']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('color', ['tpl' => 'templates/withicon'], ['icon' => 'paint-brush']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::date('deliver', $today, ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::number('amount', 0, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'usd']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::number('retainer', 0, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('observations', ['tpl' => 'templates/withicon'], ['icon' => 'eye']) !!}
                    </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" name="id" value="{{ $hreceipt->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
