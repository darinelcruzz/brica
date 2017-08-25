@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Cotizaciones pendientes"
        example="example1" color="box-default" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Entrega</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($pending as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->deliver }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones no asignadas"
        example="example2" color="box-danger">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Detalles</th>
                <th>Asignar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($completed as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->deliver }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', ['id' => $row->id]) }}" class="btn btn-danger btn-xs">
                          <i class="fa fa-info" aria-hidden="true"></i>nfo
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      {!! Form::open(['method' => 'POST', 'route' => 'runa.manager.assign']) !!}
                        <div class="input-group input-group-sm">
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <select class="form-control" name="team">
                                <option selected disabled>Elige</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->name }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-success btn-flat btn-xs">
                                  <i class="fa fa-check"></i>
                              </button>
                            </span>
                        </div>
                      {!! Form::close() !!}
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones en cola"
        example="example3" color="box-primary" collapsed="collapsed-box">
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
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      {{ $row->team }} &nbsp;&nbsp;
                      <a href="{{ route('runa.quotation.status', ['id' => $row->id, 'status' => 'terminado']) }}"
                          class="btn btn-primary btn-xs" title="REASIGNAR">
                          <i class="fa fa-backward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>{{ $row->deliver }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', ['id' => $row->id]) }}" class="btn btn-primary btn-xs">
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
                <th>Detalles</th>
                <th>Equipo</th>
                <th>Inicio</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($production as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', ['id' => $row->id]) }}" class="btn btn-warning btn-xs">
                          <i class="fa fa-info" aria-hidden="true"></i>nfo
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      {{ $row->team }} &nbsp;&nbsp;
                      <a href="{{ route('runa.quotation.edit', ['id' => $row->id]) }}"
                          class="btn btn-warning btn-xs" title="CAMBIAR">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>{{ $row->startTime }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones finalizadas"
        example="example5" color="box-success" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Detalles</th>
                <th>Equipo</th>
                <th>Inicio</th>
                <th>Final</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', ['id' => $row->id]) }}" class="btn btn-success btn-xs">
                          <i class="fa fa-info" aria-hidden="true"></i>nfo
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>{{ $row->team }}</td>
                  <td>{{ $row->startTime }}</td>
                  <td>{{ $row->endTime }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
