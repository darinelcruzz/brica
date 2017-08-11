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
            </tr>
        </template>

        <template slot="body">
            @foreach($bodyworks as $bodywork)
              <tr>
                  <td>{{ $bodywork->id }}</td>
                  <td>
                      {{ $bodywork->description }}
                      <a href="{{ route('hercules.bodywork.show', ['bodywork' => $bodywork->id]) }}"
                          class="btn btn-info btn-xs">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      Alto: {{ $bodywork->height }} m<br>
                      Largo: {{ $bodywork->length }} m<br>
                      Ancho: {{ $bodywork->width }} m
                  </td>
                  <td>{{ '$ ' . number_format($bodywork->computeTotal(), 2, '.', ',') }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
