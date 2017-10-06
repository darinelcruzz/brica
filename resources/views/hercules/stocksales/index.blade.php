@extends('hercules')

@section('main-content')
    <data-table col="col-md-12" title="Producto terminado"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Observaciones</th>
                <th><i class="fa fa-ellipsis-v" aria-hidden="true"></i></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($stocksales as $stocksale)
              <tr>
                  <td>{{ $stocksale->id }}</td>
                  <td>{{ $stocksale->name }}</td>
                  <td>{{ $stocksale->formatted_date }}</td>
                  <td>{{ $stocksale->amount }}</td>
                  <td>{{ $stocksale->observations }}</td>
                  <th>
                      <a href="{{ route('hercules.stocksale.show', ['id' => $stocksale->id ]) }}"
                          class="btn btn-primary btn-xs">
                         <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                  </th>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
