@extends('admin')

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
                    <dt>Anticipo</dt>
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
                    </tr>
                </template>

                <template slot="body">
                    @foreach($quotation->orders as $order)
                      <tr>
                          <td>{{ $order->id }}</td>
                          <td>{{ $order->type }}</td>
                          <td>{{ $order->description }}</td>
                          <td>
                              <a href="{{ route('production.order.details', ['id' => $order->id]) }}"
                                  class="btn btn-info">
                                  <i class="fa fa-info" aria-hidden="true"></i>nfo
                                  <i class="fa fa-forward" aria-hidden="true"></i>
                              </a>
                          </td>
                      </tr>
                    @endforeach
                </template>
            </data-table-com>
        </div>

    </div>
@endsection
