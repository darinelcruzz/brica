@extends('hercules')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Agregar una góndola" color="box-primary">
            {!! Form::open(['method' => 'POST', 'route' => 'hercules.gondola.store']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('brand', ['tpl' => 'templates/withicon'], ['icon' => 'trademark']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('model', ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('code', ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('color', ['tpl' => 'templates/withicon'], ['icon' => 'paint-brush']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::number('price', ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'dollar']) !!}
                    </div>
                </div>

                {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
