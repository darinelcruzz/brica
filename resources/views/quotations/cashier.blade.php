@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Producto terminado"
        example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Cobrar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>$ {{ $row->amount }}</td>
                  <td>
                      <a href="{{ route('quotation.pay', ['id' => $row->id]) }}"
                          class="btn btn-success">
                          <i class="fa fa-dollar"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Producción anticipo"
        example="example2" color="box-danger">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Pagar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($production as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->pay }}</td>
                  <td>$ {{ $row->amount }}</td>
                  <td>
                      <a href="{{ route('quotation.pay', ['id' => $row->id]) }}"
                          class="btn btn-success">
                          <i class="fa fa-dollar"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Producción finalizado"
        example="example3" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Pagar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($finished as $row)
                @if ($row->sale)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->clientr->name }}</td>
                        <td>{{ $row->description }}</td>
                        <td>$ {{ $row->sale->amount - $row->sale->retainer }}</td>
                        <td>
                            <a href="{{ route('quotation.charge', ['id' => $row->id]) }}"
                                class="btn btn-success">
                                <i class="fa fa-dollar"></i>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Folios pagados"
        example="example4" color="box-success" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($paid as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->pay }}</td>
                  <td>{{ $row->type }}</td>
                  <td>$ {{ $row->amount }}</td>
                  <td>{{ $row->date_payment }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
