@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Producción por pagar"
        example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Anticipo</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($finished as $row)
                @if (!$row->sale && $row->client != 1)
                    <tr>
                        <td>{{ $row->folio }}</td>
                        <td>{{ $row->clientr->name }}</td>
                        <td>{{ $row->description }}</td>
                        <td>$ {{ $row->amount }}</td>
                        <td>
                          <a href="{{ route('runa.cashier.calculate', ['id' => $row->id]) }}"
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
