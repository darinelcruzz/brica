@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Vendidas"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Abonar</th>
                <th>Anticipo</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($receipts as $receipt)
              @if ($receipt->order)
                  @if ($receipt->order->status != 'cancelada' && $receipt->order->status != 'pagado')
                      <tr>
                          <td>{{ $receipt->id }}</td>
                          <td>
                              {{ $receipt->bodywork ? $receipt->bodyworkr->description: 'REPARACIÓN' }}
                              &nbsp;&nbsp;&nbsp;
                              <a href="{{ route('hercules.receipt.show', ['id' => $receipt->id]) }}"
                                  class="btn btn-primary btn-xs" title="IMPRIMIR RECIBO">
                                  <i class="fa fa-file-text" aria-hidden="true"></i>
                              </a>
                              &nbsp;
                              @if ($receipt->order->photo)
                                  <a href="{{ Storage::url(substr($receipt->order->photo, 9)) }}"
                                    class="btn btn-primary btn-xs"  title='FOTO'>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                  </a>
                              @endif
                          </td>
                          <td>
                              @include('hercules.receipts.update_retainer')
                          </td>
                          <td>{{ '$ '. number_format($receipt->retainer, 2) }}</td>
                          <td>{{ '$ '. number_format($receipt->amount, 2) }}</td>
                          <td>
                              {{ ucfirst($receipt->order->status) }}
                          </td>
                      </tr>
                  @endif
              @endif
            @endforeach
        </template>
    </data-table>

@endsection
