@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Surtir material"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Observaciones</th>
                <th>Surtido</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($orders as $order)
              <tr>
                  <td>{{ $order->receiptr->id }}</td>
                  <td>
                      <a href="{{ route('hercules.warehouse.show', ['order' => $order->id]) }}"
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
                  <td>
                        @if ($order->status == 'pendiente')
                            no se ha surtido
                        @elseif ($order->status == 'surtido soldadura')
                            <button type="button" class="btn btn-xs btn-default"><b>S</b></button>
                        @elseif ($order->status == 'soldadura')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                        @elseif ($order->status == 'surtido fondeo')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-default"><b>F</b></button>
                        @elseif ($order->status == 'fondeo')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                        @elseif ($order->status == 'surtido vestido')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs btn-default"><b>V</b></button>
                        @elseif ($order->status == 'vestido')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs bg-purple">V</button>
                        @elseif ($order->status == 'surtido pintura')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs bg-purple">V</button>
                            <button type="button" class="btn btn-xs btn-default"><b>P</b></button>
                        @elseif ($order->status == 'pintura')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs bg-purple">V</button>
                            <button type="button" class="btn btn-xs btn-info">P</button>
                        @elseif ($order->status == 'surtido montaje')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs bg-purple">V</button>
                            <button type="button" class="btn btn-xs btn-info">P</button>
                            <button type="button" class="btn btn-xs btn-default"><b>M</b></button>
                        @elseif ($order->status == 'montaje')
                            <button type="button" class="btn btn-xs btn-warning">S</button>
                            <button type="button" class="btn btn-xs btn-success">F</button>
                            <button type="button" class="btn btn-xs bg-purple">V</button>
                            <button type="button" class="btn btn-xs btn-info">P</button>
                            <button type="button" class="btn btn-xs btn-danger">M</button>
                        @endif
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
