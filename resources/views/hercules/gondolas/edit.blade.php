@extends('hercules')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="Modificar gondola" color="box-primary">
            {!! Form::open(['method' => 'POST', 'route' => 'hercules.gondola.update']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('brand', $gondola->brand, ['tpl' => 'templates/withicon'], ['icon' => 'trademark']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('model', $gondola->model, ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('code', $gondola->code, ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('color', $gondola->color, ['tpl' => 'templates/withicon'], ['icon' => 'paint-brush']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::number('price', $gondola->price, ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'dollar']) !!}
                    </div>
                </div>

                <input type="hidden" name="id" value="{{ $gondola->id }}">

                {!! Form::submit('Modificar', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
