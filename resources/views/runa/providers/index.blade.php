@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Proveedores" example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>Nombre</th>
                <th>Producto (s)</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>R.F.C.</th>
            </tr>
        </template>

        @php
            $tshops = $tdebt = $tpay = 0;
        @endphp

        <template slot="body">
            @foreach ($providers as $provider)
                <tr>
                    <td>
                        {{ $provider->name }} &nbsp;&nbsp;
                        <a href="{{ route('runa.provider.show', ['rprovider' => $provider->id ]) }}"
                            class="btn btn-xs btn-success">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>{{ $provider->products }}</td>
                    <td>{{ $provider->address }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td>{{ $provider->rfc }}</td>
                </tr>
                @php
                    $tshops += $provider->total_amount;
                    $tdebt += $provider->total_debt;
                    $tpay +=  $provider->total_paid;
                @endphp
            @endforeach
        </template>
    </data-table>

    <div class="row">
        <little-box color="bg-green" size="col-md-4" icon="fa fa-shopping-cart">
            <p>Compras Totales</p>
            <h3>{{ '$ ' . number_format($tshops, 2) }}</h3>
        </little-box>

        <little-box color="bg-red" size="col-md-4" icon="fa fa-credit-card">
            <p>Adeudos Totales</p>
            <h3>{{ '$ ' . number_format($tdebt, 2) }}</h3>
        </little-box>

        <little-box color="bg-primary" size="col-md-4" icon="fa fa-usd">
            <p>Pagos Totales</p>
            <h3>{{ '$ ' . number_format($tpay, 2) }}</h3>
        </little-box>
    </div>

@endsection
