@extends('runa')

@section('main-content')

    <row-woc col="col-md-3">
        <a href="{{ route('runa.item.create') }}" class="btn btn-app">
            <span class="badge bg-yellow">{{ count($items) }}</span>
            <i class="fa fa-puzzle-piece"></i> Agregar
        </a>
    </row-woc>

    <row-woc col="col-md-12">
        <solid-box title="Control inventario" color="box-warning">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Nissan</a></li>
                    <li><a href="#tab_2" data-toggle="tab">3 Toneladas</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Pickup</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Varios</a></li>
                </ul>

                <div class="tab-content">
                    @foreach ($processes as $process)
                        @include('runa.items.tab', ['tab' => $loop->iteration])
                    @endforeach
                </div>
            </div>

        </solid-box>
    </row-woc>

@endsection
