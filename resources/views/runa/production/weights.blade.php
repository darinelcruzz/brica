@extends('runa')

@section('main-content')

  <data-table col="col-md-12" title="Cotizaciones finalizadas"
      example="example1" color="box-success">
      
      <template slot="header">
          <tr>
              <th>#</th>
              <th width="20%">Cliente</th>
              <th width="25%">Descripción</th>
              <th>Detalles</th>
              <th>Equipo</th>
              <th width="20%"><i class="fa fa-clock-o"></i></th>
              <th width="10%">Peso</th>
          </tr>
      </template>

      <template slot="body">
          @foreach($terminated->where('weight', 0) as $row)
              <tr>
                  <td>{{ $row->folio }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', ['id' => $row->id]) }}" class="btn btn-success btn-xs">
                          <i class="fa fa-info" aria-hidden="true"></i>nfo
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>{{ $row->team }}</td>
                  <td>
                    {{ $row->startTime }} <br>
                    {{ $row->endTime }}
                  </td>
                  <td>
                    {!! Form::open(['method' => 'POST', 'route' => 'runa.manager.addWeight']) !!}

                      <div class="input-group input-group-sm">
                          <input type="hidden" name="id" value="{{ $row->id }}">
                          <input type="number" class="form-control" name="weight" min="0" value="0" step="0.01" required>
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-success btn-flat btn-xs">
                                <i class="fa fa-plus"></i>
                            </button>
                          </span>
                      </div>

                    {!! Form::close() !!}
                  </td>
              </tr>
          @endforeach
      </template>
  </data-table>

@endsection