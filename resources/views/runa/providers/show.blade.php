@extends('runa')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <data-table col="col-md-12" title="Lista de compras" example="example1" color="box-warning">
                <template slot="header">
                    <tr>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>KG</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach ($rprovider->shoppings as $shopping)
                        <tr>
                            <td>{{ $shopping->shop_date }}</td>
                            <td>{{ $shopping->product }}</td>
                            <td align="right">$ {{ number_format($shopping->unit_price, 2) }}</td>
                            <td align="right">{{ $shopping->kg }}</td>
                            <td align="right">$ {{ number_format($shopping->kg * $shopping->unit_price, 2) }}</td>
                            <td>
                                <code style="{{ $shopping->pending == 0 ? "color:#04b07b;": ''}}">
                                    {{ strtoupper($shopping->status) }}
                                </code>&nbsp;
                                <a href="{{ route('runa.provider.deposit', ['rshopping' => $shopping->id ]) }}"
                                    class="btn btn-xs btn-success">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </template>
            </data-table>
        </div>

        <div class="col-md-4">
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
        </div>
    </div>

@endsection
