@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Recibos"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Concepto</th>
                <th>Anticipo</th>
                <th>Color</th>
                <th>Observaciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($receipts as $receipt)
              <tr>
                  <td>{{ $receipt->id }}</td>
                  <td>{{ $receipt->clientr->name }}</td>
                  <td>{{ $receipt->bodyworkr->description }}</td>
                  <td>{{ $receipt->retainer }} de {{ $receipt->bodyworkr->computeTotal() }}</td>
                  <td>{{ $receipt->color }}</td>
                  <td>{{ $receipt->observations }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
