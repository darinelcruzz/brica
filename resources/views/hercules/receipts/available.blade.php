@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Disponibles"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Vender</th>
                <th>Estado</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($receipts as $receipt)
              @if ($receipt->order->status != 'cancelada' || $receipt->order->status == 'terminado')
                  <tr>
                      <td>{{ $receipt->id }}</td>
                      <td>
                          {{ $receipt->bodyworkr->description }}
                          &nbsp;&nbsp;&nbsp;
                          @if ($receipt->order->photo)
                              <a href="{{ Storage::url(substr($receipt->order->photo, 9)) }}"
                                class="btn btn-primary btn-xs"  title='FOTO'>
                                <i class="fa fa-eye" aria-hidden="true"></i>
                              </a>
                          @endif
                      </td>
                      <td>
                          <a href="{{ route('hercules.receipt.edit', ['id' => $receipt->id]) }}"
                              class="btn btn-primary btn-xs" title="AGREGAR CLIENTE">
                              Agregar cliente&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>
                          </a>
                          <a href="{{ route('hercules.receipt.show', ['id' => $receipt->id]) }}"
                              class="btn btn-success btn-xs" title="IMPRIMIR RECIBO">
                              Imprimir recibo&nbsp;&nbsp;<i class="fa fa-file-text" aria-hidden="true"></i>
                          </a>
                      </td>
                      <td>
                          {{ ucfirst($receipt->order->status) }}
                      </td>
                  </tr>
              @endif
            @endforeach
        </template>
    </data-table>

@endsection
