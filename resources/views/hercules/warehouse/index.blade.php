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
                      @elseif ($order->status == 'surtido')
                        <button type="button" class="btn btn-xs btn-warning">S</button>
                      @endif
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
