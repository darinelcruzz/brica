@extends('hercules')

@section('main-content')

    <row-woc col="col-md-3">
        <a href="{{ route('hercules.item.create', ['type' => 'inventario']) }}" class="btn btn-app">
            <span class="badge bg-aqua">{{ count($items) }}</span>
            <i class="fa fa-puzzle-piece"></i> Agregar
        </a>
    </row-woc>

    <row-woc col="col-md-12">
        <solid-box title="Inventario" color="box-primary">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Soldadura</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Fondeo y pintura</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Vestido</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Montaje</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Art. varios</a></li>
                    <li><a href="#tab_6" data-toggle="tab">EPP</a></li>
                </ul>

                <div class="tab-content">
                    @foreach ($processes as $process)
                        @include('hercules.items.tab', ['tab' => $loop->iteration])
                    @endforeach
                </div>
            </div>

        </solid-box>
    </row-woc>

@endsection
