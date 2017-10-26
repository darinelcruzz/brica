@extends('runa')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Agregar un artículo" color="box-warning">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.item.update']) !!}

                {!! Field::text('description', $ritem->description, ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('unity', $ritem->unity, ['tpl' => 'templates/withicon'], ['icon' => 'info-circle']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('caliber', $ritem->caliber, ['tpl' => 'templates/withicon'], ['icon' => 'bolt']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::number('weight', $ritem->weight, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'balance-scale']) !!}
                    </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" name="id" value="{{ $ritem->id }}">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-warning pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
