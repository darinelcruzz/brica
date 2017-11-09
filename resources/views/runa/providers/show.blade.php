@extends('runa')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <data-table col="col-md-12" title="Lista de compras" example="example1" color="box-warning">
                <template slot="header">
                    <tr>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Precio Unit.</th>
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
                            <td>{{ $shopping->unit_price }}</td>
                            <td>{{ $shopping->kg }}</td>
                            <td>{{ $shopping->kg * $shopping->unit_price  }}</td>
                            <td>{{ $shopping->status }}</td>
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
