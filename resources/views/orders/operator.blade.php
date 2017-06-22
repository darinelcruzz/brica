@extends('admin')

@section('main-content')
    <!-- form start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Orden</p>
                        <h3>{!! $pending->id !!}</h3>
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
                        <h3>R2</h3>
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
                    @include('icon', ['title' => 'Tipo', 'icon' => 'industry', 'number' => $pending->type, 'color' => 'red'])
                    @include('icon', ['title' => 'Entrega', 'icon' => 'calendar','number' => $pending->deliverDate])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Diseño', 'icon' => 'wrench', 'number' => $pending->design])
                    @include('icon', ['title' => 'Descripción', 'icon' => 'edit', 'number' => $pending->description])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Calibre', 'icon' => 'compress', 'number' => $pending->caliber, 'color' => 'red'])
                    @include('icon', ['title' => 'Medidas', 'icon' => 'external-link', 'number' => $pending->measureType, 'color' => 'red'])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Piezas', 'icon' => 'list', 'number' => $pending->pieces, 'color' => 'red'])
                    @include('icon', ['title' => 'Alto', 'icon' => 'arrows-v', 'number' => $pending->height . ' cm'])
                </div>
                <div class="row">
                    @include('icon', ['title' => 'Largo ', 'icon' => 'arrows-h', 'number' => $pending->length . ' cm'])
                    @include('icon', ['title' => 'Ancho', 'icon' => 'expand', 'number' => $pending->width . ' cm'])
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <img height="100%" width="100%" src="{{ asset('/img/nuevo.png') }}">
            </div> 
        </div>

    {!! Form::open(['method' => 'POST', 'route' => 'order.finish']) !!}
        <input type="hidden" name="id" value="{!! $pending->id !!}">
        {!! Form::submit('Terminado', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

@endsection