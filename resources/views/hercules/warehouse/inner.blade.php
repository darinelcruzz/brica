@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Producción interna"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Pendientes</th>
                <th>Mover a</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($inventory as $order)
              <tr>
                  <td>{{ $order->id }}</td>
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
                              class="btn btn-primary btn-xs">
                              <i class="fa fa-print" aria-hidden="true" title="IMPRIMIR TICKET"></i>
                          </a>
                      @endif
                  </td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'vestido']) }}"
                          class="btn btn-primary btn-xs">
                          Producción <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection