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
              @if (!$receipt->order)
                  <tr>
                      <td>{{ $receipt->id }}</td>
                      <td>{{ $receipt->name }}</td>
                      <td>
                          {{ $receipt->bodywork ? $receipt->bodyworkr->description : 'REPARACIÓN' }}
                          @if (Auth::user()->level == 1)
                              &nbsp;&nbsp;
                              <a href="{{ route('hercules.receipt.edit', ['id' => $receipt->id]) }}">
                                  <i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                          @endif
                          <br>
                          <code>{{ $receipt->serial_number }}</code>
                      </td>
                      <td>{{ $receipt->formatted_retainer }}</td>
                      <td>{{ $receipt->color }}</td>
                      <td>{{ $receipt->observations }}</td>
                      <td>
                          <a href="{{ route('hercules.receipt.show', ['id' => $receipt->id]) }}"
                              class="btn btn-default btn-xs">
                              <i class="fa fa-print" aria-hidden="true"></i>
                          </a>&nbsp;&nbsp;
                          <a href="{{ route('hercules.receipt.order', ['id' => $receipt->id]) }}"
                              class="btn btn-success btn-xs">
                              <i class="fa fa-forward" aria-hidden="true" title="A PRODUCCIÓN"></i>
                          </a>
                      </td>
                  </tr>
              @else
                  @if ($receipt->order->status != 'cancelada')
                      <tr>
                          <td>{{ $receipt->id }}</td>
                          <td>{{ $receipt->name }}</td>
                          <td>
                              {{ $receipt->bodywork ? $receipt->bodyworkr->description : 'REPARACIÓN' }}
                              @if (Auth::user()->level == 1)
                                  &nbsp;&nbsp;
                                  <a href="{{ route('hercules.receipt.edit', ['id' => $receipt->id]) }}">
                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                  </a>
                              @endif
                              <br>
                              <code>{{ $receipt->serial_number }}</code>
                          </td>
                          <td>{{ $receipt->formatted_retainer }}</td>
                          <td>{{ $receipt->color }}</td>
                          <td>{{ $receipt->observations }}</td>
                          <td>
                              <a href="{{ route('hercules.receipt.show', ['id' => $receipt->id]) }}"
                                  class="btn btn-default btn-xs">
                                  <i class="fa fa-print" aria-hidden="true"></i>
                              </a>
                          </td>
                      </tr>
                  @endif
              @endif
            @endforeach
        </template>
    </data-table>

@endsection
