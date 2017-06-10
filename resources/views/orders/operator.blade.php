@extends('admin')

@section('main-content')
    <!-- form start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Orden</p>
                        <h3>{!! $uno->id !!}</h3>
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
                        <h3>H1</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">
            <div class="row">
                <img height="60%" width="60%" src="{{ asset('/img/nuevo.png') }}">
            </div>
        </div>

        <label><strong>Piezas</strong></label>{!! $uno->id !!}



    {!! Form::open(['method' => 'POST', 'route' => 'order.finish']) !!}
        <input type="hidden" name="id" value="{!! $uno->id !!}">
        {!! Form::submit('Terminado', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
    

@endsection
