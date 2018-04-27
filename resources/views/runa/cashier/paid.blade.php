@extends('runa')

@section('main-content')
  
  <data-table col="col-md-12" title="Folios pagados"
    example="example1" color="box-warning" collapsed="">
    <template slot="header">
        <tr>
            <th>Folio</th>
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
              <td>{{ $row->folio }}</td>
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