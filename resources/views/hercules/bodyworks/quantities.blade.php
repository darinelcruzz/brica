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
                        @if ($bodywork->welding != 'N;')
                            @foreach (unserialize($bodywork->welding) as $item)
                                <li style="flex-basis: 33%">
                                    {!! Field::number('welding[]',
                                        empty($formerData['welding'][$item]) ? 0: $formerData['welding'][$item],
                                        ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description . ' - ' . HItem::find($item)->caliber, 'step' => '0.01']) !!}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </accordion-item>

                <accordion-item title="Fondeo">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @if ($bodywork->anchoring != 'N;')
                            @foreach (unserialize($bodywork->anchoring) as $item)
                                <li style="flex-basis: 33%">
                                    {!! Field::number('anchoring[]',
                                        empty($formerData['anchoring'][$item]) ? 0: $formerData['anchoring'][$item],
                                        ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description . ' - ' . HItem::find($item)->caliber, 'step' => '0.01']) !!}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </accordion-item>

                <accordion-item title="Vestido">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @if ($bodywork->clothing != 'N;')
                            @foreach (unserialize($bodywork->clothing) as $item)
                                <li style="flex-basis: 33%">
                                    {!! Field::number('clothing[]',
                                        empty($formerData['clothing'][$item]) ? 0: $formerData['clothing'][$item],
                                        ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description . ' - ' . HItem::find($item)->caliber, 'step' => '0.01']) !!}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </accordion-item>

                <accordion-item title="Pintura">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @if ($bodywork->painting != 'N;')
                            @foreach (unserialize($bodywork->painting) as $item)
                                <li style="flex-basis: 33%">
                                    {!! Field::number('painting[]',
                                        empty($formerData['painting'][$item]) ? 0: $formerData['painting'][$item],
                                        ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description . ' - ' . HItem::find($item)->caliber, 'step' => '0.01']) !!}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </accordion-item>

                <accordion-item title="Montaje">
                    <ul style="display: flex; flex-flow: row wrap;">
                        @if ($bodywork->mounting != 'N;')
                            @foreach (unserialize($bodywork->mounting) as $item)
                                <li style="flex-basis: 33%">
                                    {!! Field::number('mounting[]',
                                        empty($formerData['mounting'][$item]) ? 0: $formerData['mounting'][$item],
                                        ['tpl' => 'templates/mini', 'label' => HItem::find($item)->description . ' - ' . HItem::find($item)->caliber, 'step' => '0.01']) !!}
                                </li>
                            @endforeach
                        @endif
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
