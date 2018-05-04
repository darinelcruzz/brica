<data-table col="col-md-12" title="{{ $team['title'] }}"
    example="example{{ $team['example'] }}" color="box-{{ $team['color'] }}" collapsed="collapsed-box">

    <template slot="header">
        <tr>
            <th width="5%">#</th>
            <th width="30%">Cliente</th>
            <th width="25%">Descripción</th>
            <th width="20%">Detalles</th>
            <th width="10%">Equipo</th>
            <th width="10%">Peso</th>
        </tr>
    </template>

    <template slot="body">
      @foreach($pterminated->where('team', 'R1')->where('weight', 0) as $row)
        @if($row->updated_at > '2018-04-30')
          <tr>
              <td>{{ $row->folio }}</td>
              <td>{{ $row->clientr->name }}</td>
              <td>{{ $row->description }}</td>
              <td>
                  <a href="{{ route('runa.quotation.details', ['id' => $row->id]) }}" class="btn btn-{{ $team['color'] }} btn-xs">
                      <i class="fa fa-info" aria-hidden="true"></i>nfo
                      <i class="fa fa-forward" aria-hidden="true"></i>
                  </a>
              </td>
              <td>{{ $row->team }}</td>
              <td>
                {!! Form::open(['method' => 'POST', 'route' => 'runa.manager.addWeight']) !!}

                  <div class="input-group input-group-sm">
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <input type="number" class="form-control" name="weight" min="0" value="0" step="0.01" required>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-{{ $team['color'] }} btn-flat btn-xs">
                      <i class="fa fa-plus"></i>
                      </button>
                    </span>
                  </div>

                {!! Form::close() !!}
              </td>
          </tr>
        @endif
      @endforeach
    </template>
</data-table>