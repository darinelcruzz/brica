@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Producción por pagar"
        example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>Cot #</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Anticipo</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($quotations as $row)
                @if (!$row->sale)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->clientr->name }}</td>
                        <td>{{ $row->description }}</td>
                        <td>$ {{ $row->amount }}</td>
                        <td>
                          <a href="{{ route('quotation.calculate', ['id' => $row->id]) }}"
                              class="btn btn-success">
                              <i class="fa fa-money" aria-hidden="true"></i>
                          </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>


@endsection
