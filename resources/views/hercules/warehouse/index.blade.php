@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Pendientes"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Observaciones</th>
                <th>Surtido</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($orders as $order)
              <tr>
                  <td>{{ $order->id }}</td>
                  <td>
                      {{ $order->bodyworkr->description }} &nbsp;&nbsp;&nbsp;
                      <a href="{{ route('hercules.warehouse.show', ['order' => $order->id, 'bodywork' => $order->bodyworkr->id]) }}"
                        class="btn btn-info btn-xs"  title='LISTA DE MATERIALES'>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->receiptr->observations }}</td>
                  <td>
                        @if ($order->status == 'pendiente')
                            no se ha surtido
                        @elseif ($order->status == 'surtido soldadura' || $order->status == 'soldadura')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                        @elseif ($order->status == 'surtido fondeo' || $order->status == 'fondeo')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                        @elseif ($order->status == 'surtido vestido' || $order->status == 'vestido')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs btn-default">V</button>
                        @elseif ($order->status == 'surtido pintura' || $order->status == 'pintura')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs btn-default">V</button>
                            <button type="button" class="btn btn-xs btn-info">P</button>
                        @elseif ($order->status == 'surtido montaje' || $order->status == 'montaje')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs btn-default">V</button>
                            <button type="button" class="btn btn-xs btn-info">P</button>
                            <button type="button" class="btn btn-xs btn-danger">M</button>
                        @endif
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
