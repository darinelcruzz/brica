@extends('runa')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Agregar un artículo" color="box-warning">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.item.store']) !!}

                {!! Field::text('description', ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('unity', ['tpl' => 'templates/withicon'], ['icon' => 'info-circle']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('caliber', ' ', ['tpl' => 'templates/withicon'], ['icon' => 'bolt']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::number('weight', 0, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'balance-scale']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::number('stock', 0, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'archive']) !!}
                    </div>
                </div>

                <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-warning pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
