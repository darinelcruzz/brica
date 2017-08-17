@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Calcular total"
        example="example1" color="box-primary"  collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cot #</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Anticipo</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($finished as $row)
                @if (!$row->sale && $row->client == 1)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->clientr->name }}</td>
                        <td>{{ $row->description }}</td>
                        <td>$ {{ $row->amount }}</td>
                        <td>
                          <a href="{{ route('runa.cashier.calculate', ['id' => $row->id]) }}"
                              class="btn btn-success">
                              <i class="fa fa-money" aria-hidden="true"></i>
                          </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cobrar"
        example="example3" color="box-info" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th><i class="fa fa-cog" aria-hidden="true"></i></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($finished as $row)
                @if ($row->sale && $row->client == 1)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>
                            {{ $row->clientr->name }} <br>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {{ $row->clientr->phone }}
                        </td>
                        <td>{{ $row->description }}</td>
                        @if ($row->sale)
                            <td>$ {{ $row->sale->amount - $row->sale->retainer }}</td>
                        @else
                            <td> ticket pendiente</td>
                        @endif
                        <td>
                            <a href="{{ route('runa.pay.production', ['id' => $row->id]) }}"
                                class="btn btn-xs btn-success" title="COBRAR">
                                <i class="fa fa-dollar"></i> &nbsp;COBRAR
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>
@endsection
