@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Todos" example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Observaciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($orders as $order)
              <tr>
                  <td>{{ $order->receiptr->id }}</td>
                  <td>
                      <a href="{{ route('hercules.warehouse.show', ['order' => $order->id, 'bodywork' => $order->bodyworkr->id]) }}"
                        title='LISTA DE MATERIALES'>
                        {{ $order->bodyworkr->description }}
                      </a>
                      &nbsp;&nbsp;&nbsp;
                      @if ($order->photo)
                          <a href="{{ Storage::url(substr($order->photo, 9)) }}"
                            class="btn btn-primary btn-xs"  title='FOTO'>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>
                      @endif
                      <br>
                      <code>{{ $order->serial_number }}</code>
                  </td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->receiptr->observations }}</td>

              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
