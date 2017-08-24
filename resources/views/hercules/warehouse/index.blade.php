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
                <th><i class="fa fa-ellipsis-v" aria-hidden="true"></i></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($orders as $order)
              <tr>
                  <td>{{ $order->id }}</td>
                  <td>
                      {{ $order->bodyworkr->description }} &nbsp;&nbsp;&nbsp;
                      <a href="{{ route('hercules.bodywork.show', ['bodywork' => $order->bodyworkr->id]) }}"
                        class="btn btn-info btn-xs"  title='LISTA DE MATERIALES'>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>{{ $order->receiptr->deliver }}</td>
                  <td>{{ $order->receiptr->observations }}</td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'surtido']) }}"
                          class="btn btn-success btn-xs" title="MATERIAL PREPARADO">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
