@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Producto terminado"
        example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->retainer }}</td>
                  <td>
                      <a href="{{ route('runa.pay.terminated', ['id' => $row->id]) }}"
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
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Pagar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($production as $row)
              <tr>
                  <td>{{ $row->id }}</td>
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
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th><i class="fa fa-cog" aria-hidden="true"></i></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($finished as $row)
                @if ($row->sale)
                    <tr>
                        <td>{{ $row->id }}</td>
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
                        <td>$ {{ $row->sale->amount - $row->sale->retainer }}</td>
                        <td>
                            <a href="{{ route('runa.pay.production', ['id' => $row->id]) }}"
                                class="btn btn-xs btn-success" title="COBRAR">
                                <i class="fa fa-dollar"></i> &nbsp;COBRAR
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Crédito"
        example="example4" color="box-info">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($credit as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->sale->amount or $row->retainer }}</td>
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

    <data-table col="col-md-12" title="Folios pagados"
        example="example5" color="box-success" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Detalles</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($paid as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->pay }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', ['id' => $row->id]) }}" class="btn btn-success btn-xs">
                          <i class="fa fa-info" aria-hidden="true"></i>nfo
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>{{ $row->type }}</td>
                  <td>{{ $row->retainer }}</td>
                  <td>{{ $row->date_payment }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
