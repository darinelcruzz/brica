@extends('runa')

@section('main-content')

    <div class="row">
        <div class="col-md-9">
            <data-table col="col-md-12" title="Lista de compras" example="example1" color="box-warning">
                <template slot="header">
                    <tr>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>KG</th>
                        <th>Importe</th>
                        <th>Abonado</th>
                        <th>Estado</th>
                    </tr>
                </template>

                @php
                    $tshops = $tdebt = $tpay = 0;
                @endphp

                <template slot="body">
                    @foreach ($rprovider->shoppings as $shopping)
                        <tr>
                            <td>{{ $shopping->shop_date }}</td>
                            <td>{{ $shopping->product }}</td>
                            <td align="right">{{ number_format($shopping->unit_price, 2) }}</td>
                            <td align="right">{{ $shopping->kg }}</td>
                            <td align="right">{{ number_format($shopping->amount, 2) }}</td>
                            <td align="right">{{ number_format($shopping->amount - $shopping->pending, 2) }}</td>
                            <td>
                                <code style="{{ round($shopping->pending) == 0 ? "color:#04b07b;": ''}}">
                                    {{ strtoupper(round($shopping->pending) == 0 ? 'PAGADO': 'PENDIENTE') }}
                                </code>&nbsp;
                                <a href="{{ route('runa.provider.deposit', ['rshopping' => $shopping->id ]) }}"
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
            <solid-box title="Agregar compra" color="box-warning">
                {!! Form::open(['method' => 'POST', 'route' => 'runa.provider.shop']) !!}
                    {!! Field::date('date', Date::now(), ['tpl' => 'templates/withicon'], ['icon' => 'calendar-o']) !!}
                    {!! Field::text('product', ['tpl' => 'templates/withicon'], ['icon' => 'shield']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('unit_price',
                                ['tpl' => 'templates/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'dollar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('kg',
                                ['tpl' => 'templates/withicon', 'min' => '0', 'step' => '0.01'], ['icon' => 'balance-scale']) !!}
                        </div>
                    </div>
                    <input type="hidden" name="provider" value="{{ $rprovider->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-warning pull-right']) !!}
                {!! Form::close() !!}
            </solid-box>

            <a href="{{ route('runa.provider.index') }}"
                class="btn btn-danger">
                <i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Regresar a proveedores
            </a>
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
