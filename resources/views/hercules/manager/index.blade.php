@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Pendientes"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Equipo</th>
                <th>Observaciones</th>
                <th><i class="fa fa-ellipsis-v" aria-hidden="true"></i></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($pending as $order)
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
                  <td>
                      @if (!$order->welding)
                          @include('templates/hercules/assign')
                      @endif
                      {{ $order->welding }}
                  </td>
                  <td>{{ $order->receiptr->observations }}</td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'soldadura']) }}"
                          class="btn btn-primary btn-xs" title="A SOLDADURA">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Soldadura"
        example="example2" color="box-warning" collapsed="collapsed-box">
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
            @foreach($welding as $order)
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
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'fondeo']) }}"
                          class="btn btn-warning btn-xs" title="A FONDEO">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Fondeo"
        example="example3" color="box-success" collapsed="collapsed-box">
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
            @foreach($anchoring as $order)
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
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'vestido']) }}"
                          class="btn btn-success btn-xs" title="A VESTIDO">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Vestido"
        example="example4" color="box-default" collapsed="collapsed-box">
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
            @foreach($clothing as $order)
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
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'pintura']) }}"
                          class="btn btn-default btn-xs" title="A PINTURA">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Pintura"
        example="example5" color="box-info" collapsed="collapsed-box">
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
            @foreach($painting as $order)
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
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'montaje']) }}"
                          class="btn btn-info btn-xs" title="A MONTAJE">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Montaje"
        example="example6" color="box-danger" collapsed="collapsed-box">
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
            @foreach($mounting as $order)
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
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'terminado']) }}"
                          class="btn btn-danger btn-xs" title="TERMINAR">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
