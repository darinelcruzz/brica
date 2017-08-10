@extends('hercules')

@section('main-content')

  @php
    use App\Models\Hercules\HItem;
  @endphp

  <row-woc col="col-md-12">
      <solid-box title="Agrega las cantidades" color="box-primary">
          {!! Form::open(['method' => 'POST', 'route' => 'hercules.bodywork.quantities']) !!}

            <div class="box-group" id="accordion">

                <accordion-item title="Soldadura">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @foreach (unserialize($bodywork->welding) as $item)
                            <li style="flex-basis: 33%">
                                {!! Field::number('welding[]', 0,
                                    ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description, 'step' => '0.01']) !!}
                            </li>
                        @endforeach
                    </ul>
                </accordion-item>

                <accordion-item title="Fondeo">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @foreach (unserialize($bodywork->anchoring) as $item)
                            <li style="flex-basis: 33%">
                                {!! Field::number('anchoring[]', 0,
                                    ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description, 'step' => '0.01']) !!}
                            </li>
                        @endforeach
                    </ul>
                </accordion-item>

                <accordion-item title="Vestido">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @foreach (unserialize($bodywork->clothing) as $item)
                            <li style="flex-basis: 33%">
                                {!! Field::number('clothing[]', 0,
                                    ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description, 'step' => '0.01']) !!}
                            </li>
                        @endforeach
                    </ul>
                </accordion-item>

                <accordion-item title="Pintura">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @foreach (unserialize($bodywork->painting) as $item)
                            <li style="flex-basis: 33%">
                                {!! Field::number('painting[]', 0,
                                    ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description, 'step' => '0.01']) !!}
                            </li>
                        @endforeach
                    </ul>
                </accordion-item>

                <accordion-item title="Montaje">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @foreach (unserialize($bodywork->mounting) as $item)
                            <li style="flex-basis: 33%">
                                {!! Field::number('mounting[]', 0,
                                    ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description, 'step' => '0.01']) !!}
                            </li>
                        @endforeach
                    </ul>
                </accordion-item>
            </div>

            <div class="box-footer">
                <input type="hidden" name="id" value="{{ $bodywork->id }}">
                {!! Form::submit('Continuar', ['class' => 'btn btn-primary pull-right']) !!}
            </div>

          {!! Form::close() !!}
      </solid-box>
  </row-woc>

@endsection
