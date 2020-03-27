@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Ventas"
        example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>Folio</th>
                <th><i class="fa fa-print" aria-hidden="true"></i></th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th style="width: 10%">Anticipo</th>
                <th style="width: 10%">Importe</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->quotationr->folio or '' }}</td>
                <td>
                  <a href="{{ route('runa.sale.ticket', $sale)}}" class="btn btn-warning btn-xs">
                      <i class="fa fa-print" aria-hidden="true"></i>
                  </a>
                </td>
                <td>{{ $sale->quotationr->clientr->name }}</td>
                <td>{{ $sale->created_at->format('d/m/y | h:i a') }}</td>
                <td>{{ strtoupper($sale->quotationr->description) }}</td>
                <td style="text-align: right;">
                    @if ($sale->quotationr->type == 'terminado')
                        0.00
                    @else
                        {{ number_format($sale->retainer, 2) }}
                    @endif
                </td>
                <td style="text-align: right;">
                    <strong>{{ number_format($sale->amount, 2) }}</strong>
                </td>
            </tr>
            @endforeach
        </template>
    </data-table>

@endsection
