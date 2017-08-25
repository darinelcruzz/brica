@extends('hercules')

@section('main-content')

    <row-woc col="col-md-12">
        <solid-box title="A surtir"
            color="box-primary">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Soldadura</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Fondeo</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Vestido</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Pintura</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Montaje</a></li>
                </ul>

                <div class="tab-content">
                    @foreach ($processes as $english => $spanish)
                        @include('hercules.warehouse.tab', [
                            'tab' => $loop->iteration, 'number' => $loop->iteration * 2 - 2,
                            'process' => $hbodywork->$english,  'proceso' => $spanish
                        ])
                    @endforeach
                </div>
            </div>

        </solid-box>
    </row-woc>

@endsection
