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
                <th><i class="fa fa-ellipsis-v" aria-hidden="true"></i></th>
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
                  <td>
                      <a href="{{ route('hercules.receipt.show', ['id' => $receipt->id]) }}"
                          class="btn btn-default btn-xs">
                          <i class="fa fa-print" aria-hidden="true"></i>
                      </a>&nbsp;&nbsp;
                      @if (!$receipt->order)
                          <a href="{{ route('hercules.receipt.order', ['id' => $receipt->id]) }}"
                              class="btn btn-success btn-xs">
                              <i class="fa fa-forward" aria-hidden="true" title="A PRODUCCIÓN"></i>
                          </a>
                      @endif
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
