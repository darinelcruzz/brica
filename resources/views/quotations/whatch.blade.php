@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Producto terminado"
        example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($finish as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->clientr->name }}</td>
                <td>{{ $row->pay }}</td>
                <td>$ {{ $row->amount }}</td>
                <td>
                      <input type="hidden" name="id" value="{{ $row->id }}">
                      <a href="{{ route('quotation.build', ['id' => $row->id]) }}"><i class="fa fa-check-square-o"></i></a>
                </td>
            </tr>
            @endforeach
        </template>
    </data-table>


@endsection
