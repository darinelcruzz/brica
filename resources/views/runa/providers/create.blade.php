@extends('runa')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Agregar proveedor" color="box-warning">
            {!! Form::open(['method' => 'POST', 'route' => 'runa.provider.store']) !!}
                {!! Field::text('name', ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('address', ['tpl' => 'templates/withicon'], ['icon' => 'home']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('city', ['tpl' => 'templates/withicon'], ['icon' => 'globe']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('phone', ['tpl' => 'templates/withicon'], ['icon' => 'phone']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('rfc',
                            ['label' => 'R.F.C.', 'tpl' => 'templates/withicon'], ['icon' => 'id-card-o'])
                        !!}
                    </div>
                </div>
                {!! Field::text('products',
                    ['label' => 'Productos', 'tpl' => 'templates/withicon'], ['icon' => 'th-large']) 
                !!}
                {!! Form::submit('Agregar', ['class' => 'btn btn-warning pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>

@endsection
