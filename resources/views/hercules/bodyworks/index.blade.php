@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Carrocerías"
        example="example2" color="box-primary">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Medidas (alto x largo x ancho)</th>
                <th>Costo</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($bodyworks as $bodywork)
              <tr>
                  <td>{{ $bodywork->id }}</td>
                  <td>
                      <a href="{{ route('hercules.bodywork.show', ['bodywork' => $bodywork->id]) }}"
                        title='DETALLES'>
                          {{ $bodywork->description }}
                      </a>&nbsp;&nbsp;
                      <a href="{{ route('hercules.bodywork.edit', ['bodywork' => $bodywork->id]) }}"
                        title='EDITAR'>
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                      &nbsp;&nbsp;
                      <a href="{{ route('hercules.bodywork.clone', ['bodywork' => $bodywork->id]) }}"
                        title='DUPLICAR'>
                          <i class="fa fa-clone" aria-hidden="true"></i>
                      </a>
                      &nbsp;&nbsp;
                      <a href="{{ route('hercules.bodywork.disable', ['bodywork' => $bodywork->id]) }}"
                        title='DESHABILITAR'>
                          <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      {{ $bodywork->height }} m <i class="fa fa-times" aria-hidden="true"></i>
                      {{ $bodywork->length }} m <i class="fa fa-times" aria-hidden="true"></i>
                      {{ $bodywork->width }} m
                  </td>
                  <td>{{ '$ ' . number_format($bodywork->computeTotal(), 2, '.', ',') }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
