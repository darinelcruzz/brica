@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Lista de pagos" example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Importe</th>
                <th>Producto</th>
                <th>Banco</th>
            </tr>
        </template>

        <template slot="body">
            @foreach ($rdeposits as $rdeposit)
                <tr>
                    <td>{{ fdate($rdeposit->date) }}</td>
                    <td>{{ $rdeposit->shoppingr->providerr->name }}</td>
                    <td>$ {{ number_format($rdeposit->amount, 2) }}</td>
                    <td>{{ $rdeposit->shoppingr->product }}</td>
                    <td>{{ strtoupper($rdeposit->bank) }}</td>
                </tr>

            @endforeach
        </template>
    </data-table>

@endsection
