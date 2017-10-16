@extends('hercules')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Agregar un artículo" color="box-primary">
            {!! Form::open(['method' => 'POST', 'route' => 'hercules.item.store']) !!}

                <div class="row">
                    <div class="col-md-8">
                        {!! Field::text('description', ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Field::text('code', ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                    </div>
                </div>

                <row-woc col="col-md-12">
                  <label for="processes">Procesos:</label><br>
                    @if ($type == 'carroceria')
                        {!! Form::checkboxes('processes',
                          ['soldadura' => 'Soldadura', 'fondeo' => 'Fondeo', 'vestido' => 'Vestido',
                            'pintura' => 'Pintura', 'montaje' => 'Montaje'], null, ['class' => 'inline'])
                        !!}
                    @else
                        {!! Form::radios('family', ['soldadura' => 'Soldadura', 'fondeo y pintura' => 'Fondeo & Pintura', 'vestido' => 'Vestido',
                          'varios' => 'Art. varios', 'montaje' => 'Montaje', 'epp' => 'EPP', 'remolques' => 'Remolques'], null, ['class' => 'inline']) !!}
                    @endif
                </row-woc>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('unity', ['tpl' => 'templates/withicon'], ['icon' => 'info-circle']) !!}
                        {!! Field::number('price', 0, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'usd']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('caliber', '-', ['tpl' => 'templates/withicon'], ['icon' => 'bolt']) !!}
                        {!! Field::number('weight', 0, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'balance-scale']) !!}
                    </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" name="type" value="{{ $type }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
