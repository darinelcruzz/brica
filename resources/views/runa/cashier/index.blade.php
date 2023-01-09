@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Producto terminado"
        example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $quotation)
              <tr>
                  <td>{{ $quotation->folio }}</td>
                  <td>{{ $quotation->clientr->name }}</td>
                  <td>{{ $quotation->description }}</td>
                  <td>{{ $quotation->retainer }}</td>
                  <td>
                      <a href="{{ route('runa.pay.terminated', $quotation->id) }}"
                          class="btn btn-success">
                          <i class="fa fa-dollar"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Producción anticipo"
        example="example2" color="box-danger">
        <template slot="header">
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Pagar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($production as $quotation)
              <tr>
                  <td>{{ $quotation->folio }}</td>
                  <td>{{ $quotation->clientr->name }}</td>
                  <td>{{ $quotation->pay }}</td>
                  <td>{{ $quotation->retainer }}</td>
                  <td>
                      <a href="{{ route('runa.pay.retainer', $quotation) }}"
                          class="btn btn-success">
                          <i class="fa fa-dollar"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Producción finalizado"
        example="example3" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th><i class="fa fa-cog" aria-hidden="true"></i></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($finished as $quotation)
                @if ($quotation->client != 1)
                    <tr>
                        <td>{{ $quotation->folio }}</td>
                        <td>
                            {{ $quotation->clientr->name }} &nbsp;&nbsp;&nbsp;
                            @if (Auth::user()->level == 2)
                                @if (!$quotation->notified)
                                    <a href="{{ route('runa.notify', $quotation) }}"
                                        class="btn btn-xs btn-info" title="CLIENTE AVISADO">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            @endif
                            <br>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {{ $quotation->clientr->phone }}
                        </td>
                        <td>{{ $quotation->description }}</td>
                        @if ($quotation->sale)
                            <td>$ {{ $quotation->sale->amount - $quotation->sale->retainer }}</td>
                            <td>
                                <a href="{{ route('runa.pay.production', $quotation) }}"
                                    class="btn btn-xs btn-success" title="COBRAR">
                                    <i class="fa fa-dollar"></i> &nbsp;COBRAR
                                </a>
                            </td>
                        @else
                            <td> ticket pendiente</td>
                            <td>
                                <a href="#" style="pointer-events: none; display: inline-block;"
                                    class="btn btn-xs btn-success" title="COBRAR" disabled>
                                    <i class="fa fa-dollar"></i> &nbsp;COBRAR
                                </a>
                            </td>
                        @endif

                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Crédito"
        example="example4" color="box-info">
        <template slot="header">
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($credit as $quotation)
              <tr>
                  <td>{{ $quotation->folio }}</td>
                  <td>{{ $quotation->clientr->name }}</td>
                  <td>{{ $quotation->description }}</td>
                  <td>{{ $quotation->sale->amount ?? $quotation->retainer }}</td>
                  @if ($quotation->type == 'produccion')
                      <td>
                          <a href="{{ route('runa.pay.production', $quotation) }}"
                              class="btn btn-success">
                              <i class="fa fa-dollar"></i>
                          </a>
                      </td>
                  @else
                      <td>
                          <a href="{{ route('runa.pay.terminated', $quotation) }}"
                              class="btn btn-success">
                              <i class="fa fa-dollar"></i>
                          </a>
                      </td>
                  @endif
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
