@extends('hercules')

@section('main-content')

  <row-woc col="col-md-6">
      <solid-box title="Agregar carrocería" color="box-primary">
          {!! Form::open(['method' => 'POST', 'route' => 'hercules.bodywork.store']) !!}

              <row-woc col="col-md-12">
                  {!! Field::text('description', ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}
              </row-woc>

              <row-woc col="col-md-12">
                  {!! Field::text('family', ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}
              </row-woc>

              <div class="row">
                  <div class="col-md-4">
                      {!! Field::number('length', 0, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'arrows-h', 'unit' => 'm']) !!}
                  </div>
                  <div class="col-md-4">
                      {!! Field::number('width', 0, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'expand', 'unit' => 'm']) !!}
                  </div>
                  <div class="col-md-4">
                      {!! Field::number('height', 0, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'arrows-v', 'unit' => 'm']) !!}
                  </div>
              </div>

              <div class="box-footer">
                  {!! Form::submit('Continuar', ['class' => 'btn btn-primary pull-right']) !!}
              </div>
              {!! Form::close() !!}
      </solid-box>
  </row-woc>

@endsection
