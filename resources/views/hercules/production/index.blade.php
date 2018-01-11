@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Pendientes"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th><i class="fa fa-cogs"></i></th>
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
                      {{ $order->bodywork ? $order->bodyworkr->description: 'REPARACIÓN' }}<br>
                      <code>{{ $order->serial_number or 'SIN # SERIE'}}</code>
                      @if ($order->receiptr->type != 'reparacion')
                          <p class="text-green">{{ strtoupper($order->receiptr->type) }}</p>
                      @endif
                  </td>
                  <td>
                    <dropdown color="primary" icon="cogs">
                        <ddi to="{{ route('hercules.warehouse.show', ['order' => $order->id]) }}"
                            icon="check" text="Surtir">
                        </ddi>
                        <ddi v-if="{{ $order->serial_number ? 1:0 }}" to="{{ route('hercules.order.print_ticket', ['id' => $order->id]) }}"
                            icon="print" text="Imprimir ticket">
                        </ddi>
                        <ddi v-else to="{{ route('hercules.order.ticket', ['id' => $order->id, 'assigned' => 'welding']) }}"
                            icon="pencil" text="Generar ticket">
                        </ddi>
                    </dropdown>
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
                            <th>{!! $th !!}</th>
                        @elseif ($th != 'Selecciona equipo')
                            <th>{!! $th !!}</th>
                        @endif
                    @endforeach
                </tr>
            </template>

            <template slot="body">
                @foreach(${$process['english']} as $order)
                  <tr>
                      <td>{{ $order->receiptr->id }}</td>
                      <td>
                          {{ $order->bodywork ? $order->bodyworkr->description: 'REPARACIÓN' }}<br>
                          <code>{{ $order->serial_number or 'SIN # SERIE'}}</code>
                          @if ($order->receiptr->type != 'reparacion')
                              <p class="text-green">{{ strtoupper($order->receiptr->type) }}</p>
                          @endif
                      </td>
                      <td>
                        <dropdown color="{{ $process['color'] }}" icon="cogs">
                            <ddi v-if="{{ $order->receiptr->client == 1 ? 1:0 }}" to="{{ route('hercules.receipt.edit', ['id' => $order->receipt]) }}"
                                icon="user" text="Agregar cliente">
                            </ddi>
                            <ddi v-if="{{ $order->bodywork ? 1:0 }}" to="{{ route('hercules.warehouse.show', ['order' => $order->id]) }}"
                                icon="check" text="Surtir">
                            </ddi>
                            <li>
                                <a data-toggle="modal" data-target="#{{ $order->serial_number }}">
                                    <i class="fa fa-picture-o"></i> Foto
                                </a>
                            </li>
                            <ddi v-if="{{ $order->serial_number ? 1:0 }}" to="{{ route('hercules.order.print_ticket', ['id' => $order->id]) }}"
                                icon="print" text="Imprimir ticket">
                            </ddi>
                            <ddi v-else to="{{ route('hercules.order.ticket', ['id' => $order->id, 'assigned' => 'welding']) }}"
                                icon="pencil" text="Generar ticket">
                            </ddi>
                        </dropdown>

                        <modal title="{{ $order->bodyworkr->description }}" id="{{ $order->serial_number }}">
                            <img src="{{ Storage::url(substr($order->photo, 9)) }}" alt="{{ $order->bodyworkr->description }}" width="80%">
                            <template slot="footer">
                              <a href="{{ route('hercules.photo.load', ['order' => $order->id]) }}"
                                class="btn btn-default">
                                  <i class="fa fa-upload"></i> Subir foto
                              </a>
                            </template>
                        </modal>
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
