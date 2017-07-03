@extends('admin')

@section('main-content')

    <data-table col="col-md-12"
        title="Órdenes pendientes" example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Detalle</th>
            </tr>
        </template>

        <template slot="body">
            @forelse($pending as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->type}}</td>
                    <td>{{ $row->quotation }}</td>
                    <td>
                        <a href="{{ route('production.operatorOrder', ['id' => $row->id]) }}"
                            class="btn btn-success">
                                <i class="fa fa-play"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </template>

        <template slot="footer">
                @if (isset($row))
                    {!! Form::open(['method' => 'POST', 'route' => 'production.finish']) !!}
                        <input type="hidden" name="id" value="{{ $row->quotation }}">
                        {!! Form::submit('Terminado', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
                @else
                    <label>No hay órdenes para esta cotización</label>
                    <br>
                    <a href="{{ route('production.change')}}" class="'btn btn-primary'">Cambiar estado</a>
                @endif
        </template>
    </data-table>

@endsection
