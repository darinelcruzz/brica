@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Ventas"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Importe</th>
                <th>Imprimir</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->quotationr->folio or '' }}</td>
                <td>{{ $sale->quotationr->clientr->name }}</td>
                <td>{{ $sale->quotationr->description }}</td>
                @if ($sale->quotationr->type == 'terminado')
                    <td>${{ $sale->amount }}</td>
                @else
                    <td>${{ $sale->amount }} (anticipo ${{ $sale->retainer}})</td>
                @endif
                <td>
                  <a href="{{ route('runa.sale.ticket', ['id' => $sale->id])}}" class="btn btn-success">
                      <i class="fa fa-print" aria-hidden="true"></i>&nbsp;
                      ticket
                  </a>
                </td>
            </tr>
            @endforeach
        </template>
    </data-table>

@endsection
