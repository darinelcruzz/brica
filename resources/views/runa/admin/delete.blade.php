@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Cotizaciones"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Año</th>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>Órdenes</th>
                <th>Borrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($quotations as $quotation)
              <tr>
                  <td>{{ fdate($quotation->created_at, 'Y') }}</td>
                  <td>{{ $quotation->folio }}</td>
                  <td>{{ $quotation->clientr->name }}</td>
                  <td>{{ $quotation->type }}</td>
                  <td>{{ $quotation->status }}</td>
                  <td>{{ $quotation->description }}</td>
                  <td>
                      <a href="{{ route('runa.quotation.details', $quotation) }}"
                          >
                          {{ count($quotation->orders) }} &nbsp;
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      @if ($quotation->status != 'pagado')
                          <a href="{{ route('runa.cancel', $quotation) }}">
                              <i class="fa fa-trash"></i>
                          </a>
                      @endif
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
