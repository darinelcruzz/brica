@extends('hercules')

@section('main-content')

    <row-woc col="col-md-12">
        <solid-box title="Producto terminado" color="box-primary">

            {!! Form::open(['method' => 'POST', 'route' => 'hercules.stocksale.store']) !!}

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
                        {!! Field::text('observations', ['tpl' => 'templates/withicon'], ['icon' => 'eye']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::date('date', Jenssegers\Date\Date::now(), ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                    </div>
                </div>

                <row-woc col="col-md-12">
                    <item-table :retainer="0" :discount="0"></item-table>
                </row-woc>

                <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
