@extends('runa')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Elige otro equipo para {{ $quotation->id }}, actualmente es {{ $quotation->team }}" color="box-warning">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.quotation.change']) !!}
              <div class="input-group input-group-sm">
                  <input type="hidden" name="id" value="{{ $quotation->id }}">
                  <select class="form-control" name="team">
                      <option selected disabled>Elige</option>
                      @foreach ($teams as $team)
                          <option value="{{ $team->name }}">{{ $team->name }}</option>
                      @endforeach
                  </select>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning btn-flat btn-xs">
                        <i class="fa fa-check"></i>
                    </button>
                  </span>
              </div>
            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
