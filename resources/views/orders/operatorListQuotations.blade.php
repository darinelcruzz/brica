@extends('admin')

@section('main-content')

    <data-table col="col-md-12"
        title="Trabajos pendientes" example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Empezar</th>
            </tr>
        </template>

        <template slot="body">
            @forelse($pending as $quotation)
                <tr>
                    <td>{{ $quotation->id }}</td>
                    <td>{{ $quotation->type }}</td>
                    <td>{{ $quotation->description }}</td>
                    <td>{{ $quotation->deliver }}</td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'route' => 'production.start']) !!}
                            <input type="hidden" name="id" value="{{ $quotation->id }}">
                            <button type="submit" name="button" class="btn btn-primary">
                                <i class="fa fa-play"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </template>
    </data-table>

@endsection
