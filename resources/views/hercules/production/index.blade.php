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
                <th>Mover a</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($pending as $order)
              <tr>
                  <td>{{ $order->receiptr->id }}</td>
                  <td>
                      {{ $order->bodywork ? $order->bodyworkr->description: 'REPARACIÓN' }}
                      <a href="{{ route('hercules.warehouse.show', ['order' => $order->id]) }}"
                        title='SURTIR' class="btn btn-primary btn-xs">
                        <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                      @if ($order->serial_number)
                          &nbsp;&nbsp;
                          <a href="{{ route('hercules.order.print_ticket', ['id' => $order->id]) }}"
                              class="btn btn-primary btn-xs">
                              <i class="fa fa-print" aria-hidden="true" title="IMPRIMIR TICKET"></i>
                          </a><br>
                          <code>{{ $order->serial_number }}</code>
                      @else
                          &nbsp;&nbsp;
                          <a href="{{ route('hercules.order.ticket', ['id' => $order->id, 'assigned' => 'welding']) }}"
                              class="btn btn-primary btn-xs" title="GENERAR TICKET">
                              <i class="fa fa-pencil" aria-hidden="true"></i>
                          </a>
                      @endif
                      @if ($order->receiptr->type != 'reparacion')
                          <p class="text-green">{{ strtoupper($order->receiptr->type) }}</p>
                      @endif
                  </td>
                  <td>{{ $order->receiptr->deliver_date }}</td>
                  <td>{{ $order->receiptr->observations }}</td>
                  <td>
                      <a style="{{ !$order->welding || $order->status != 'surtido soldadura' ? "pointer-events: none; display: inline-block;" : '' }}"
                        href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'soldadura']) }}"
                          class="btn btn-primary btn-xs" {{ !$order->welding || $order->status != 'surtido soldadura' ? " disabled" : '' }}>
                          Soldadura <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    @foreach ($processes as $process)
        <data-table col="col-md-12" title="{{ ucfirst($process['spanish']) }}"
            example="example{{ $loop->index + 2 }}" color="box-{{ $process['color'] }}" collapsed="collapsed-box">
            <template slot="header">
                <tr>
                    @foreach ($header as $th)
                        @if (!$loop->parent->last)
                            <th>{{ $th }}</th>
                        @elseif ($th != 'Selecciona equipo')
                            <th>{{ $th }}</th>
                        @endif
                    @endforeach
                </tr>
            </template>

            <template slot="body">
                @foreach(${$process['english']} as $order)
                  <tr>
                      <td>{{ $order->receiptr->id }}</td>
                      <td>
                          {{ $order->bodywork ? $order->bodyworkr->description: 'REPARACIÓN' }} &nbsp;&nbsp;&nbsp;
                          @if ($order->bodywork)
                              <a href="{{ route('hercules.warehouse.show', ['order' => $order->id]) }}"
                                title='SURTIR' class="btn btn-{{ $process['color'] }} btn-xs">
                                <i class="fa fa-check" aria-hidden="true"></i>
                              </a>
                          @endif
                          @includeWhen($order->photo, 'hercules/components/photo')
                          @include('hercules/components/upload_photo')
                          @include('hercules/components/production_buttons')
                      </td>
                      <td>{{ $order->receiptr->deliver_date }}</td>
                      <td>{{ $order->{$process['english']} }}</td>
                      <td>{{ $order->startDate }}</td>
                      @if (!$loop->parent->last)
                          <td>
                              @includeWhen(!$order->{$process['next']['e']}, 'hercules/production/assign')
                              {{ $order->{$process['next']['e']} }}
                          </td>
                      @endif
                      <td>
                          @if (($order->receiptr->client == 1 || $order->receiptr->type == 'reparacion') && $order->status != 'montaje')
                              @include('hercules/production/moveto')
                          @elseif ($loop->parent->last)
                              <a href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => 'terminado']) }}"
                                  class="btn btn-{{ $process['color'] }} btn-xs">
                                  {{ ucfirst($process['next']['s']) }}
                                  <i class="fa fa-forward" aria-hidden="true"></i>
                              </a>
                          @else
                              @include('hercules/components/sbutton')
                          @endif
                      </td>
                  </tr>
                @endforeach
            </template>
        </data-table>
    @endforeach

@endsection
