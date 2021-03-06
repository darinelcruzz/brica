@extends('hercules')

@section('main-content')

    <data-table col="col-md-10" title="Proveedores" example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Nombre</th>
                <th>Producto (s)</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>R.F.C.</th>
            </tr>
        </template>

        <template slot="body">
            @foreach ($providers as $provider)
                <tr>
                    <td>
                        {{ $provider->name }} &nbsp;&nbsp;
                        <a href="{{ route('hercules.provider.show', ['hprovider' => $provider->id ]) }}"
                            class="btn btn-xs btn-success">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>{{ $provider->products }}</td>
                    <td>{{ $provider->address }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td>{{ $provider->rfc }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

@endsection
