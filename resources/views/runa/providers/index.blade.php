@extends('runa')

@section('main-content')

    <data-table col="col-md-10" title="Proveedores" example="example1" color="box-warning">
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
                        <a href="{{ route('runa.provider.show', ['rprovider' => $provider->id ]) }}">
                            <i class="fa fa-usd" aria-hidden="true"></i>
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
