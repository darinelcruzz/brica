@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Semiterminados"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Pendientes</th>
                <th>A producción</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($inventory as $order)
              <tr>
                  <td>{{ $order->receiptr->id }}</td>
                  <td>
                      {{ $order->bodyworkr->description }}
                      &nbsp;&nbsp;&nbsp;
                      @if ($order->photo)
                          <a href="{{ Storage::url(substr($order->photo, 9)) }}"
                            class="btn btn-primary btn-xs"  title='FOTO'>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>
                      @endif
                  </td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>
                      @if ($order->receiptr->client == 1)
                          <a href="{{ route('hercules.receipt.edit', ['id' => $order->receipt]) }}"
                              class="btn btn-primary btn-xs">
                              Agregar cliente <i class="fa fa-user" aria-hidden="true"></i>
                          </a>
                      @else
                          <a href="{{ route('hercules.order.ticket', ['id' => $order->id]) }}"
                              class="btn btn-primary btn-xs" title="GENERAR TICKET">
                              Actualizar ticket &nbsp;<i class="fa fa-file" aria-hidden="true"></i>
                          </a>
                          <a href="{{ route('hercules.order.print_ticket', ['id' => $order->id]) }}"
                              class="btn btn-primary btn-xs" title="IMPRIMIR TICKET">
                              <i class="fa fa-print" aria-hidden="true"></i>
                          </a>
                          <a href="{{ route('hercules.receipt.show', ['id' => $order->receipt]) }}"
                              class="btn btn-primary btn-xs" title="IMPRIMIR RECIBO">
                              <i class="fa fa-file-text" aria-hidden="true"></i>
                          </a>
                      @endif
                  </td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => $order->whereToGo ]) }}"
                          class="btn btn-primary btn-xs">
                          {{ ucfirst($order->whereToGo) }} <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
