@extends('hercules')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Editar artículo" color="box-primary">
            {!! Form::open(['method' => 'POST', 'route' => 'hercules.item.update']) !!}

                <row-woc col="col-md-12">
                    {!! Field::text('description', $hitem->description, ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}
                </row-woc>

                <row-woc col="col-md-12">
                  <label for="processes">Procesos:</label><br>
                    {!! Form::checkboxes('processes',
                      ['soldadura' => 'Soldadura', 'fondeo' => 'Fondeo', 'vestido' => 'Vestido',
                        'pintura' => 'Pintura', 'montaje' => 'Montaje'], unserialize($hitem->family), ['class' => 'inline'])
                    !!}
                </row-woc>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('unity', $hitem->unity, ['tpl' => 'templates/withicon'], ['icon' => 'info-circle']) !!}
                        {!! Field::number('price', $hitem->price, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'usd']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('caliber', $hitem->caliber, ['tpl' => 'templates/withicon'], ['icon' => 'bolt']) !!}
                        {!! Field::number('weight', $hitem->weight, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'balance-scale']) !!}
                    </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" name="id" value="{{ $hitem->id }}">
                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
