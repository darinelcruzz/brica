@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Runa 1"
      example="example1" color="box-warning" collapsed="collapsed-box">
      
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
          @foreach($terminated->where('team', 'R1')->where('weight', '>', 0) as $row)
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
                  <td>{{ $row->team }}</td>
                  <td>
                    {{ $row->startTime }} <br>
                    {{ $row->endTime }}
                  </td>
                  <td>
                    {{ $row->weight }} kg
                  </td>
              </tr>
          @endforeach
      </template>
    </data-table>

    <data-table col="col-md-12" title="Runa 2"
      example="example2" color="box-default" collapsed="collapsed-box">
      
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
          @foreach($terminated->where('team', 'R2')->where('weight', '>', 0) as $row)
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
                  <td>{{ $row->team }}</td>
                  <td>
                    {{ $row->startTime }} <br>
                    {{ $row->endTime }}
                  </td>
                  <td>
                    {{ $row->weight }} kg
                  </td>
              </tr>
          @endforeach
      </template>
    </data-table>

    <data-table col="col-md-12" title="Runa 3"
      example="example3" color="box-warning" collapsed="collapsed-box">
      
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
          @foreach($terminated->where('team', 'R3')->where('weight', '>', 0) as $row)
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
                  <td>{{ $row->team }}</td>
                  <td>
                    {{ $row->startTime }} <br>
                    {{ $row->endTime }}
                  </td>
                  <td>
                    {{ $row->weight }} kg
                  </td>
              </tr>
          @endforeach
      </template>
    </data-table>

    <data-table col="col-md-12" title="Runa 4"
      example="example4" color="box-default" collapsed="collapsed-box">
      
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
          @foreach($terminated->where('team', 'R4')->where('weight', '>', 0) as $row)
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
                  <td>{{ $row->team }}</td>
                  <td>
                    {{ $row->startTime }} <br>
                    {{ $row->endTime }}
                  </td>
                  <td>
                    {{ $row->weight }} kg
                  </td>
              </tr>
          @endforeach
      </template>
    </data-table>

    <data-table col="col-md-12" title="Runa Corte"
      example="example5" color="box-warning" collapsed="collapsed-box">
      
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
          @foreach($terminated->where('team', 'RC')->where('weight', '>', 0) as $row)
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
                  <td>{{ $row->team }}</td>
                  <td>
                    {{ $row->startTime }} <br>
                    {{ $row->endTime }}
                  </td>
                  <td>
                    {{ $row->weight }} kg
                  </td>
              </tr>
          @endforeach
      </template>
    </data-table>

@endsection