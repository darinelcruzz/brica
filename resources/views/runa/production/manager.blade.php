@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Cotizaciones pendientes"
        example="example1" color="box-default">
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
                      <a v-if="{{ count($row->orders) }}" href="{{ route('runa.quotation.details', ['id' => $row->id]) }}"
                          class="btn btn-danger btn-xs">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                          ({{ count($row->orders) }})
                      </a>
                      <p v-else>{{ count($row->orders) }}</p>
                  </td>
                  <td>{{ $row->deliver }}</td>
                  <td>
                      <a href="{{ route('runa.order.create', ['cot' => $row->id]) }}" class="btn btn-danger btn-xs">
                          <i class="fa fa-plus" aria-hidden="true"></i>
                      </a>
                      <a v-if="{{ count($row->orders) }}" href="{{ route('runa.engineer.complete', ['cot' => $row->id]) }}"
                          class="btn btn-success btn-xs">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
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
                  <td>{{ $row->folio }}</td>
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
                                    @if ($team->name != 'RC')
                                        <option value="{{ $team->name }}">{{ $team->name }}</option>
                                    @endif
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
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      {{ $row->team }} &nbsp;&nbsp;
                      <a href="{{ route('runa.quotation.edit', ['id' => $row->id]) }}"
                          class="btn btn-primary btn-xs" title="CAMBIAR">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
                  <td>{{ $row->folio }}</td>
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
@endsection
