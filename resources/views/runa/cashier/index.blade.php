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
            @foreach($terminated as $row)
              <tr>
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->retainer }}</td>
                  <td>
                      <a href="{{ route('runa.pay.terminated', $row->id) }}"
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
            @foreach($production as $row)
              <tr>
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->pay }}</td>
                  <td>{{ $row->retainer }}</td>
                  <td>
                      <a href="{{ route('runa.pay.retainer', ['id' => $row->id]) }}"
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
            @foreach($finished as $row)
                @if ($row->client != 1)
                    <tr>
                        <td>{{ $row->folio }}</td>
                        <td>
                            {{ $row->clientr->name }} &nbsp;&nbsp;&nbsp;
                            @if (Auth::user()->level == 2)
                                @if (!$row->notified)
                                    <a href="{{ route('runa.notify', ['id' => $row->id]) }}"
                                        class="btn btn-xs btn-info" title="CLIENTE AVISADO">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @else
                                    <i class="fa fa-check"></i>
                                @endif
                            @endif
                            <br>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {{ $row->clientr->phone }}
                        </td>
                        <td>{{ $row->description }}</td>
                        @if ($row->sale)
                            <td>$ {{ $row->sale->amount - $row->sale->retainer }}</td>
                            <td>
                                <a href="{{ route('runa.pay.production', ['id' => $row->id]) }}"
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
            @foreach($credit as $row)
              <tr>
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->sale->amount ?? $row->retainer }}</td>
                  @if ($row->type == 'produccion')
                      <td>
                          <a href="{{ route('runa.pay.production', ['id' => $row->id]) }}"
                              class="btn btn-success">
                              <i class="fa fa-dollar"></i>
                          </a>
                      </td>
                  @else
                      <td>
                          <a href="{{ route('runa.pay.terminated', ['id' => $row->id]) }}"
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
