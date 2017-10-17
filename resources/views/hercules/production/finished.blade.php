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
                  <td>{{ $order->id }}</td>
                  <td>
                      {{ $order->bodywork ? $order->bodyworkr->description: 'REPARACIÓN' }}
                      &nbsp;
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'pagado']) }}"
                          class="btn btn-xs btn-primary" title="MARCAR COMO PAGADO">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                      <br>
                      <code>{{ $order->serial_number }}</code>
                  </td>
                  <td>{{ $order->receiptr->name }}</td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->start_date_for_finished }} <br> {{ $order->end_date_for_finished}}</td>
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
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->bodywork ? $order->bodyworkr->description: 'REPARACIÓN' }} <br> <code>{{ $order->serial_number }}</code></td>
                  <td>{{ $order->receiptr->name }}</td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->start_date_for_finished }} <br> {{ $order->end_date_for_finished}}</td>
                  <td>{{ $order->receiptr->observations }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
