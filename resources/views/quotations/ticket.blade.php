@extends('admin')

@section('main-content')
    <data-table col="col-md-12" title="Cotizaciones pendientes"
        example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Entrega</th>
            </tr>
        </template>

        <template slot="body">
            <tr>
              <td>{{ $quotation->id }}</td>
              <td>{{ $quotation->clientr->name }}</td>
              <td>{{ $quotation->description }}</td>
              <td>{{ $quotation->deliver_date }}</td>
            </tr>
        </template>
    </data-table>

    <div class="col-xs-12">
      <button onclick="printTicket()" class="btn btn-default">
          <i class="fa fa-print"></i> Print
      </button>
    </div>

    <script>
    function printTicket() {
        window.print();
    }
    </script>
@endsection
