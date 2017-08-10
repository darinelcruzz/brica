@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Carrocerías"
        example="example2" color="box-default">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Medidas</th>
                <th>Precio</th>
                <th>Procesos</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($bodyworks as $bodywork)
              <tr>
                  <td>{{ $bodywork->id }}</td>
                  <td>{{ $bodywork->description }}</td>
                  <td>
                      Alto: {{ $bodywork->height }} m<br>
                      Largo: {{ $bodywork->length }} m<br>
                      Ancho: {{ $bodywork->width }} m
                  </td>
                  <td>{{ $bodywork->price }}</td>
                  <td>
                      S: {{ $bodywork->welding }}<br>
                      F: {{ $bodywork->anchoring }}<br>
                      V: {{ $bodywork->clothing }}<br>
                      P: {{ $bodywork->painting }}<br>
                      M: {{ $bodywork->mounting }}
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
