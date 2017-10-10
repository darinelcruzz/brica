@extends('hercules')

@section('main-content')

    <div class="row">

        <div class="col-md-6">
            <solid-box title="Editar personal" color="box-primary">
                {!! Form::open(['method' => 'POST', 'route' => 'hercules.personnel.update']) !!}
                    {!! Field::text('name', $hpersonnel->name, ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                    {!! Field::select('type',
                        ['equipo' => 'Equipo', 'soldador' => 'Soldador', 'carpintero' => 'Carpintero', 'pintor' => 'Pintor'],
                        [$hpersonnel->type], ['tpl' => 'templates/withicon',
                        'empty' => 'Elige tipo'], ['icon' => 'users']) !!}
                    <input type="hidden" name="id" value="{{ $hpersonnel->id }}">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </solid-box>
        </div>

    </div>

@endsection
