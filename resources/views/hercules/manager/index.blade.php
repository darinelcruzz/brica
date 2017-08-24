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
                <th>Selecciona equipo</th>
                <th>Mover a</th>
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
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->receiptr->observations }}</td>
                  <td>
                      @if (!$order->welding)
                          @include('templates/hercules/assign', [
                              'tprocess' => 'welding', 'tproceso' => 'soldadura', 'tcolor' => 'primary'
                          ])
                      @endif
                      {{ $order->welding }}
                  </td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'soldadura']) }}"
                          class="btn btn-primary btn-xs" title="A SOLDADURA">
                          Soldadura <i class="fa fa-forward" aria-hidden="true"></i>
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
                <th>Asignado a</th>
                <th>Inicio</th>
                <th>Selecciona equipo</th>
                <th>Mover a</th>
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
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->welding }}</td>
                  <td>{{ $order->startDate }}</td>
                  <td>
                      @if (!$order->anchoring)
                          @include('templates/hercules/assign', [
                              'tprocess' => 'anchoring', 'tproceso' => 'fondeo', 'tcolor' => 'warning'
                          ])
                      @endif
                      {{ $order->anchoring }}
                  </td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'fondeo']) }}"
                          class="btn btn-warning btn-xs" title="A FONDEO">
                          Fondeo <i class="fa fa-forward" aria-hidden="true"></i>
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
                <th>Asignado a</th>
                <th>Inicio</th>
                <th>Selecciona equipo</th>
                <th>Mover a</th>
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
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->anchoring }}</td>
                  <td>{{ $order->startDate }}</td>
                  <td>
                      @if (!$order->clothing)
                          @include('templates/hercules/assign', [
                              'tprocess' => 'clothing', 'tproceso' => 'vestido', 'tcolor' => 'success'
                          ])
                      @endif
                      {{ $order->clothing }}
                  </td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'vestido']) }}"
                          class="btn btn-success btn-xs" title="A VESTIDO">
                          Vestido <i class="fa fa-forward" aria-hidden="true"></i>
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
                <th>Asignado a</th>
                <th>Inicio</th>
                <th>Selecciona equipo</th>
                <th>Mover a</th>
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
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->clothing }}</td>
                  <td>{{ $order->startDate }}</td>
                  <td>
                      @if (!$order->painting)
                          @include('templates/hercules/assign', [
                              'tprocess' => 'painting', 'tproceso' => 'pintura', 'tcolor' => 'default'
                          ])
                      @endif
                      {{ $order->painting }}
                  </td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'pintura']) }}"
                          class="btn btn-default btn-xs" title="A PINTURA">
                          Pintura <i class="fa fa-forward" aria-hidden="true"></i>
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
                <th>Asignado a</th>
                <th>Inicio</th>
                <th>Selecciona equipo</th>
                <th>Mover a</th>
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
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->painting }}</td>
                  <td>{{ $order->startDate }}</td>
                  <td>
                      @if (!$order->mounting)
                          @include('templates/hercules/assign', [
                              'tprocess' => 'mounting', 'tproceso' => 'montaje', 'tcolor' => 'info'
                          ])
                      @endif
                      {{ $order->mounting }}
                  </td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'montaje']) }}"
                          class="btn btn-info btn-xs" title="A MONTAJE">
                          Montaje <i class="fa fa-forward" aria-hidden="true"></i>
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
                <th>Asignado a</th>
                <th>Inicio</th>
                <th>Mover a</th>
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
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->mounting }}</td>
                  <td>{{ $order->startDate }}</td>
                  <td>
                      <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'terminado']) }}"
                          class="btn btn-danger btn-xs" title="TERMINAR">
                          Terminar &nbsp;<i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
