@extends('runa')

@section('main-content')
    <div class="row">

        <div class="col-md-2">
            <solid-box title="Cotización {{ $quotation->id }}" color="box-default" collapsed=''>
                <dl>
                    <dt>Cliente:</dt>
                    <dd>{{ $quotation->clientr->name }}</dd>
                    <dt>Descripción:</dt>
                    <dd>{{ $quotation->description }}</dd>
                    <dt>Entrega:</dt>
                    <dd>{{ $quotation->deliver }}</dd>
                    <dt>Anticipo:</dt>
                    <dd>$ {{ $quotation->amount }}</dd>
                </dl>
            </solid-box>
        </div>

        <div class="col-md-10">
            <data-table-com title="Órdenes (asignado a {{ $quotation->team }})"
                example="example1" color="box-info">
                <template slot="header">
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Detalle</th>
                        @if(Auth::user()->level == 1)
                            <th>Borrar</th>
                        @endif
                    </tr>
                </template>

                <template slot="body">
                    @foreach($quotation->orders as $order)
                      <tr>
                          <td>{{ $order->id }}</td>
                          <td>{{ $order->type }}</td>
                          <td>{{ $order->description }}</td>
                          <td>
                              <a href="{{ route('runa.order.show', ['id' => $order->id]) }}"
                                  class="btn btn-info btn-xs">
                                  <i class="fa fa-info" aria-hidden="true"></i>nfo
                                  <i class="fa fa-forward" aria-hidden="true"></i>
                              </a>
                          </td>
                          @if(Auth::user()->level == 1)
                              <td>
                                  <a href="{{ route('production.deleteOrder', ['id' => $order->id]) }}">
                                      <i class="fa fa-trash"></i>
                                  </a>
                              </td>
                          @endif
                      </tr>
                    @endforeach
                </template>
            </data-table-com>
        </div>

    </div>
@endsection
