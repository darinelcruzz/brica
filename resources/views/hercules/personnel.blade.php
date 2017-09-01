@extends('hercules')

@section('main-content')

    <div class="row">

        <div class="col-md-6">
            <solid-box title="Lista del personal" color="box-primary">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($personnel as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ ucfirst($member->type) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </solid-box>
        </div>

        <div class="col-md-6">
            <solid-box title="Agregar elemento" color="box-primary">
                {!! Form::open(['method' => 'POST', 'route' => 'hercules.personnel.create']) !!}
                    {!! Field::text('name', ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                    {!! Field::select('type', ['equipo' => 'Equipo', 'operador' => 'Operador'], null, ['tpl' => 'templates/withicon',
                        'empty' => 'Elige tipo'], ['icon' => 'users']) !!}
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </solid-box>
        </div>

    </div>

@endsection