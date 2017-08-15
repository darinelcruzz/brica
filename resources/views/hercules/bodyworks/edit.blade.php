@extends('hercules')

@section('main-content')

  <row-woc col="col-md-12">
      <solid-box title="Agregar carrocería" color="box-primary">
          {!! Form::open(['method' => 'POST', 'route' => 'hercules.bodywork.update']) !!}

              <div class="row">
                  <div class="col-md-6">
                      {!! Field::text('description', $hbodywork->description, ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}
                  </div>

                  <div class="col-md-6">
                      {!! Field::text('family', $hbodywork->family, ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-3">
                      {!! Field::number('length', $hbodywork->length, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'arrows-h', 'unit' => 'm']) !!}
                  </div>
                  <div class="col-md-3">
                      {!! Field::number('width', $hbodywork->width, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'expand', 'unit' => 'm']) !!}
                  </div>
                  <div class="col-md-3">
                      {!! Field::number('height', $hbodywork->height, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'arrows-v', 'unit' => 'm']) !!}
                  </div>
              </div>

              <div class="box-group" id="accordion">
                  @foreach ($processes as $process => $proceso)
                      <accordion-item title="{{ ucfirst($proceso) }}">
                          <ul style="display: flex; flex-flow: row wrap; list-style-type:none;">
                              @foreach ($items[$process] as $id => $description)
                                  <li style="flex-basis: 25%">
                                      <label class="checkbox-inline">
                                          <input name="{{ $process }}[]" type="checkbox" value="{{ $id }}"
                                            {{ in_array($id, array_keys(unserialize($hbodywork->$process))) ? ' checked': '' }}>
                                          {{ $description }}
                                      </label>
                                  </li>
                              @endforeach
                          </ul>
                      </accordion-item>
                  @endforeach
              </div>

              <div class="box-footer">
                  <input type="hidden" name="id" value="{{ $hbodywork->id }}">
                  {!! Form::submit('Continuar', ['class' => 'btn btn-primary pull-right']) !!}
              </div>
              {!! Form::close() !!}
      </solid-box>
  </row-woc>

@endsection
