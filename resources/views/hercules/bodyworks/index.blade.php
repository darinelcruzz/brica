@extends('hercules')

@section('main-content')

    <data-table col="col-md-6" title="Carrocerías"
        example="example2" color="box-default">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Medidas</th>
                <th>Precio</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($bodyworks as $bodywork)
              <tr>
                  <td>{{ $bodywork->id }}</td>
                  <td>{{ $bodywork->description }}</td>
                  <td>
                      Alto: {{ $bodywork->height }}<br>
                      Largo: {{ $bodywork->length }}<br>
                      Ancho: {{ $bodywork->width }}
                  </td>
                  <td>{{ $bodywork->price }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
