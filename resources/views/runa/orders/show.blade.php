@extends('runa')

@section('main-content')
    <!-- form start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Orden</p>
                        <h3>{!! $order->id !!}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Equipo</p>
                        <h3>{{ auth()->user()->name }}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    @include('icon', ['title' => 'Tipo', 'icon' => 'industry', 'number' => $order->type, 'color' => 'red'])
                    @include('icon', ['title' => 'Diseño', 'icon' => 'wrench', 'number' => $order->design])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Descripción', 'icon' => 'edit', 'number' => $order->description])
                    @include('icon', ['title' => 'Calibre', 'icon' => 'compress', 'number' => $order->caliber, 'color' => 'red'])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Medidas', 'icon' => 'external-link', 'number' => $order->measureType, 'color' => 'red'])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Piezas', 'icon' => 'list', 'number' => $order->pieces, 'color' => 'red'])
                    @include('icon', ['title' => 'Alto', 'icon' => 'arrows-v', 'number' => $order->height . ' cm'])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Largo ', 'icon' => 'arrows-h', 'number' => $order->length . ' cm'])
                    @include('icon', ['title' => 'Ancho', 'icon' => 'expand', 'number' => $order->width . ' cm'])
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                @if ($order->added)
                    <img height="100%" width="100%" src="{{ $order->added }}">
                @endif

                <solid-box title="Solicitar corte" collapsed="collapsed-box">
                    <row-woc col="col-md-6">
                        <ul>
                            @foreach ($order->cuts as $cut)
                                <li>{{ $cut->quantity }} pieza(s) calibre {{ $cut->caliber }} de {{ $cut->length }} x {{ $cut->width}}.</li>
                            @endforeach
                        </ul>
                    </row-woc>
                    {!! Form::open(['method' => 'POST', 'route' => 'runa.cut.store']) !!}
                        <div class="row">
                            <div class="col-md-3">
                                {!! Field::number('quantity', 0, ['label' => 'Piezas', 'min' => '0', 'step' => '0.1'])!!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::number('length', 0, ['min' => '0', 'step' => '0.1'])!!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::number('width', 0, ['min' => '0', 'step' => '0.1'])!!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::text('caliber')!!}
                            </div>
                        </div>
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="team_id" value="{{ auth()->user()->id }}">
                        {!! Form::submit('Solicitar', ['class' => 'btn btn-warning pull-right']) !!}
                    {!! Form::close() !!}
                </solid-box>
            </div>
        </div>

@endsection
