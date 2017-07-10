@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Cotizaciones"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>#</th>
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
                  <td>{{ $quotation->id }}</td>
                  <td>{{ $quotation->clientr->name }}</td>
                  <td>{{ $quotation->type }}</td>
                  <td>{{ $quotation->status }}</td>
                  <td>{{ $quotation->description }}</td>
                  <td>
                      <a href="{{ route('quotation.details', ['id' => $quotation->id]) }}"
                          >
                          {{ count($quotation->orders) }} &nbsp;
                          <i class="fa fa-forward" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      @if ($quotation->status != 'pagado')
                          <a href="{{ route('quotation.cancel', ['id' => $quotation->id]) }}">
                              <i class="fa fa-trash"></i>
                          </a>
                      @endif
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
