@extends('hercules')

@section('main-content')

    <div class="row">
        <div class="col-md-9">
            <data-table col="col-md-12" title="Lista de compras" example="example1" color="box-primary">
                <template slot="header">
                    <tr>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Importe</th>
                        <th>Abonado</th>
                        <th>Estado</th>
                    </tr>
                </template>

                @php
                    $tshops = $tdebt = $tpay = 0;
                @endphp

                <template slot="body">
                    @foreach ($hprovider->shoppings as $shopping)
                        <tr>
                            <td>{{ $shopping->shop_date }}</td>
                            <td>{{ $shopping->product }}</td>
                            <td align="right">$ {{ number_format($shopping->unit_price, 2) }}</td>
                            <td align="right">{{ $shopping->quantity }} {{ $shopping->unity }}</td>
                            <td align="right">$ {{ number_format($shopping->amount, 2) }}</td>
                            <td align="right">$ {{ number_format($shopping->amount - $shopping->pending, 2) }}</td>
                            <td>
                                <code style="{{ $shopping->pending == 0 ? "color:#04b07b;": ''}}">
                                    {{ strtoupper($shopping->status) }}
                                </code>&nbsp;
                                <a href="{{ route('hercules.provider.payment', ['hshopping' => $shopping->id ]) }}"
                                    class="btn btn-xs btn-success" title="ABONAR">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                        @php
                            $tshops += $shopping->amount;
                            $tdebt += $shopping->pending;
                            $tpay +=  $shopping->amount - $shopping->pending;
                        @endphp
                    @endforeach
                </template>
            </data-table>
        </div>

        <div class="col-md-3">
            <solid-box title="Agregar compra" color="box-primary">
                {!! Form::open(['method' => 'POST', 'route' => 'hercules.provider.shop']) !!}
                    {!! Field::date('date', Date::now(), ['tpl' => 'templates/withicon'], ['icon' => 'calendar-o']) !!}
                    {!! Field::text('product', ['tpl' => 'templates/withicon'], ['icon' => 'shield']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('unit_price',
                                ['tpl' => 'templates/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('quantity',
                                ['tpl' => 'templates/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'stack-overflow']) !!}
                        </div>
                    </div>
                    {!! Field::select('unity',
                        ['kg' => 'Kilogramos', 'pzas' => 'Piezas', 'l' => 'Litros'], null,
                        ['tpl' => 'templates/withicon', 'empty' => '¿Kg, litros, piezas?'], ['icon' => 'balance-scale'])
                    !!}
                    <input type="hidden" name="provider" value="{{ $hprovider->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

    <div class="row">
    	<little-box color="bg-green" size="col-md-4" icon="fa fa-shopping-cart">
    		<p>Compras</p>
    		<h3>{{ '$ ' . number_format($tshops, 2) }}</h3>
    	</little-box>

    	<little-box color="bg-red" size="col-md-4" icon="fa fa-credit-card">
    		<p>Adeudos</p>
    		<h3>{{ '$ ' . number_format($tdebt, 2) }}</h3>
    	</little-box>

    	<little-box color="bg-primary" size="col-md-4" icon="fa fa-usd">
    		<p>Pagos</p>
    		<h3>{{ '$ ' . number_format($tpay, 2) }}</h3>
    	</little-box>
    </div>

@endsection
