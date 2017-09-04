@extends('hercules')

@section('main-content')

  <row-woc col="col-md-12">
      <solid-box title="Agregar carrocería" color="box-primary">
          {!! Form::open(['method' => 'POST', 'route' => 'hercules.bodywork.store']) !!}

              <div class="row">
                  <div class="col-md-6">
                      {!! Field::text('description', ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}
                  </div>

                  <div class="col-md-6">
                      {!! Field::text('family', ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-3">
                      {!! Field::number('length', 0, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'arrows-h', 'unit' => 'm']) !!}
                  </div>
                  <div class="col-md-3">
                      {!! Field::number('width', 0, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'expand', 'unit' => 'm']) !!}
                  </div>
                  <div class="col-md-3">
                      {!! Field::number('height', 0, ['tpl' => 'templates/iconatend', 'step' => '0.01'], ['icon' => 'arrows-v', 'unit' => 'm']) !!}
                  </div>
              </div>

              <div class="box-group" id="accordion">
                  @foreach ($processes as $process => $proceso)
                      <accordion-item title="{{ ucfirst($proceso) }}">
                          <input style="width: 100%; font-size: 16px; padding: 12px 20px 12px 40px; border: 1px solid #ddd; margin-bottom: 12px;"
                            type="text" id="itemSearchBox{{ $loop->iteration }}"
                            onkeyup="ulSearchBox{{ $loop->iteration }}()"
                            placeholder="Buscar por nombre...">
                          <ul id="ulItems{{ $loop->iteration }}" style="display: flex; flex-flow: row wrap; list-style-type:none;">
                              @foreach ($items[$process] as $item)
                                  <li style="flex-basis: 25%">
                                      <label class="checkbox-inline">
                                          <input name="{{ $process }}[]" type="checkbox" value="{{ $item->id }}">
                                          {{ $item->description }} {{ $item->caliber }}
                                      </label>
                                  </li>
                              @endforeach
                          </ul>
                      </accordion-item>
                  @endforeach
              </div>

              <div class="box-footer">
                  {!! Form::submit('Continuar', ['class' => 'btn btn-primary pull-right']) !!}
              </div>
              {!! Form::close() !!}
      </solid-box>
  </row-woc>

  @include('hercules.bodyworks.search_script')

@endsection
