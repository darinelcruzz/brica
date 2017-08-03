@extends('hercules')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Agregar un artículo" color="box-primary">
            {!! Form::open(['method' => 'POST', 'route' => 'hercules.item.store']) !!}

                <row-woc col="col-md-12">
                    {!! Field::text('description', ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}
                </row-woc>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('unity', ['tpl' => 'templates/withicon'], ['icon' => 'info-circle']) !!}
                        {!! Field::number('price', ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'usd']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('caliber', ['tpl' => 'templates/withicon'], ['icon' => 'bolt']) !!}
                        {!! Field::number('weight', ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'balance-scale']) !!}
                    </div>
                </div>

                <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
