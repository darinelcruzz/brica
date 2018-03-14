@extends('hercules')

@section('main-content')
    <row-woc col="col-md-6">
        <solid-box title="VENDER GONDOLA" color="box-primary">
            <hr>
            <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ $gondola->brand }} <small>{{ $gondola->model }}</small></span>
                    <span class="info-box-number">
                        {{ $gondola->code }} <span class="pull-right">$ {{ number_format($gondola->price, 2) }}</span>
                    </span>
                    <span class="progress-description">
                        {{ $gondola->color }}
                    </span>
                </div>
            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'hercules.gondola.sell']) !!}

                {!! Field::select('client_id', $clients, null,
                    ['tpl' => 'templates/withicon', 'empty' => 'Seleccione un cliente', 'label' => 'Cliente'],
                    ['icon' => 'user'])
                !!}

                {!! Field::number('retainer', 0,
                    ['tpl' => 'templates/withicon', 'label' => '¿Anticipo?', 'step' => '0.01', 'min' => '0'],
                    ['icon' => 'usd'])
                !!}

                <hr>
                <input type="hidden" name="id" value="{{ $gondola->id }}">

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        {!! Form::submit('Vender', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
