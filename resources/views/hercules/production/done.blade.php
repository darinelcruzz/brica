@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Terminados"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Inicio</th>
                <th>Final</th>
                <th>Observaciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $order)
              <tr>
                  <td>{{ $order->id }}</td>
                  <td>
                      {{ $order->bodyworkr->description }} &nbsp;
                      <a href="{{ route('hercules.production.ticket', ['id' => $order->id]) }}"
                          class="btn btn-default btn-xs">
                          <i class="fa fa-print" aria-hidden="true" title="TICKET"></i>
                      </a>
                  </td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->startDate }}</td>
                  <td>{{ $order->endDate }}</td>
                  <td>{{ $order->receiptr->observations }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
