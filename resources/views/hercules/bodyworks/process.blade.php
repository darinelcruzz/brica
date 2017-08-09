@extends('hercules')

@section('main-content')

  <row-woc col="col-md-6">
      <solid-box title="{{ ucfirst($processes[$index]) }}" color="box-primary">
          {!! Form::open(['method' => 'POST', 'route' => 'hercules.bodywork.process']) !!}
              <row-woc col="col-md-12">
                <h4>Elegir artículos a utilizar en {{ $processes[$index] }}</h4>
                <hr>
                {!! Form::checkboxes('processes', $items, null, ['class' => 'inline']) !!}
              </row-woc>

              <div class="box-footer">
                  {!! Form::submit('Continuar', ['class' => 'btn btn-primary pull-right']) !!}
              </div>
          {!! Form::close() !!}
      </solid-box>
  </row-woc>

@endsection
