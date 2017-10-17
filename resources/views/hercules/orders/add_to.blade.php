@extends('hercules')

@section('main-content')

    <row-woc col="col-md-6">

        <solid-box title="Detalles: Orden {{ $order->id }}" color="box-primary">
            @if ($order->bodywork)
                <b>Carrocería tipo:</b> {{ $order->bodyworkr->description }} <br>
                <b>Largo:</b> {{ $order->bodyworkr->length }}  m.
                <b>Alto:</b> {{ $order->bodyworkr->height }}   m.
                <b>Ancho:</b> {{ $order->bodyworkr->width }}   m. <br>
                <b>Observaciones:</b> {{ $order->receiptr->observations }}
            @else
                <b>REPARACIÓN</b>
            @endif

            <br><br>

            {!! Form::open(['method' => 'POST', 'route' => 'hercules.order.update']) !!}
                {!! Field::text('serial_number', $order->serial_number, ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('brand', $order->brand, ['tpl' => 'templates/withicon'], ['icon' => 'industry']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('model', $order->model, ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('chasis', $order->chasis, ['tpl' => 'templates/withicon'], ['icon' => 'skyatlas']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('floor', $order->floor, ['tpl' => 'templates/withicon'], ['icon' => 'object-group']) !!}
                    </div>
                </div>

                {!! Field::text('clothing_spec', $order->clothing_spec, ['tpl' => 'templates/withicon'], ['icon' => 'codepen']) !!}

                <div class="row">
                    @if ($order->status != 'interno')
                        <div class="col-md-6">
                            {!! Field::select('welding', $personnel, null, ['tpl' => 'templates/withicon',
                                'empty' => 'Equipo o personal'], ['icon' => 'fire']) !!}
                        </div>
                    @else
                        <input type="hidden" name="welding" value="{{ $order->welding }}">
                    @endif
                    <div class="col-md-6">
                        {!! Field::text('supervisor', $order->supervisor, ['tpl' => 'templates/withicon'], ['icon' => 'eye']) !!}
                    </div>
                </div><br>

                <input type="hidden" name="id" value="{{ $order->id }}">

                {!! Form::submit('Agregar datos', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </solid-box>

    </row-woc>
@endsection
