@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Cotizaciones pendientes"
        example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Órdenes</th>
                <th>Entrega</th>
                <th><i class="fa fa-cogs"></i></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($pending as $row)
              <tr>
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      <a v-if="{{ count($row->orders) }}" href="{{ route('runa.quotation.details', $row) }}"
                          class="btn btn-danger btn-xs">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                          ({{ count($row->orders) }})
                      </a>
                      <p v-else>{{ count($row->orders) }}</p>
                  </td>
                  <td>{{ $row->deliver }}</td>
                  <td>
                      <a href="{{ route('runa.order.create', $row) }}" class="btn btn-danger btn-xs">
                          <i class="fa fa-plus" aria-hidden="true"></i>
                      </a>
                      <a v-if="{{ count($row->orders) }}" href="{{ route('runa.engineer.complete', $row) }}"
                          class="btn btn-success btn-xs">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones no asignadas"
        example="example2" color="box-default">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Detalles</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($completed as $row)
              <tr>
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->deliver }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', $row) }}" class="btn btn-info btn-xs">
                          <i class="fa fa-info" aria-hidden="true"></i>nfo
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones en cola"
        example="example3" color="box-danger">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Equipo</th>
                <th>Entrega</th>
                <th>Detalles</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($authorized as $row)
              <tr>
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->team }}</td>
                  <td>{{ $row->deliver }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', $row) }}" class="btn btn-danger btn-xs">
                          <i class="fa fa-info" aria-hidden="true"></i>nfo
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones en producción"
        example="example4" color="box-warning">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Equipo</th>
                <th>Inicio</th>
                <th>Detalles</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($production as $row)
            <tr>
                <td>{{ $row->folio }}</td>
                <td>{{ $row->clientr->name }}</td>
                <td>{{ $row->description }}</td>
                <td>{{ $row->team }}</td>
                <td>{{ $row->startTime }}</td>
                <td>
                    <a href="{{ route('runa.quotation.details', $row) }}" class="btn btn-warning btn-xs">
                        <i class="fa fa-info" aria-hidden="true"></i>nfo
                        <i class="fa fa-forward" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones finalizadas"
        example="example5" color="box-success">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Equipo</th>
                <th>Inicio</th>
                <th>Final</th>
                <th>Detalles</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $row)
            <tr>
                <td>{{ $row->folio }}</td>
                <td>{{ $row->clientr->name }}</td>
                <td>{{ $row->description }}</td>
                <td>{{ $row->team }}</td>
                <td>{{ $row->startTime }}</td>
                <td>{{ $row->endTime }}</td>
                <td>
                    <a href="{{ route('runa.quotation.details', $row) }}" class="btn btn-success btn-xs">
                        <i class="fa fa-info" aria-hidden="true"></i>nfo
                        <i class="fa fa-forward" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </template>
    </data-table>

@endsection
