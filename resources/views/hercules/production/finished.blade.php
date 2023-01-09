@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Finalizadas"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Cliente</th>
                <th>Entrega</th>
                <th>Inicio/Final</th>
                <th>Observaciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $order)
              <tr>
                  <td>{{ $order->receipt }}</td>
                  <td>
                      {{ $order->bodyworkr->description ?? 'REPARACIÓN' }}
                      &nbsp;
                      <a href="{{ route('hercules.order.status', [$order, 'pagado']) }}"
                          class="btn btn-xs btn-primary" title="MARCAR COMO PAGADO">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                      <br>
                      <code>{{ $order->serial_number }}</code>
                  </td>
                  <td>{{ $order->receiptr->name }}</td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ fdate($order->startDate, 'd, M h:i a') }} <br> {{ fdate($order->endDate, 'd, M h:i a') }}</td>
                  <td>{{ $order->receiptr->observations }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Pagadas"
        example="example2" color="box-success">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Cliente</th>
                <th>Entrega</th>
                <th>Inicio/Final</th>
                <th>Observaciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($paid as $order)
              <tr>
                  <td>{{ $order->receiptr->id }}</td>
                  <td>{{ $order->bodyworkr->description ?? 'REPARACIÓN' }} <br> <code>{{ $order->serial_number }}</code></td>
                  <td>{{ $order->receiptr->name }}</td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ fdate($order->startDate, 'd, M h:i a') }} <br> {{ fdate($order->endDate, 'd, M h:i a') }}</td>
                  <td>{{ $order->receiptr->observations }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
