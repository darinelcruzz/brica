@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Producto terminado"
        example="example1" color="box-danger" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Monto</th>
                <th>Pagar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>$ {{ $row->amount }}</td>
                  <td>
                      {!! Form::open(['method' => 'POST', 'route' => 'quotation.pay']) !!}
                          <input type="hidden" name="id" value="{{ $row->id }}">
                          <button type="submit" name="button" class="btn btn-success">
                              <i class="fa fa-dollar"></i>
                          </button>
                      {!! Form::close() !!}
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Producción"
        example="example2" color="box-danger">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Monto</th>
                <th>Pagar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($production as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>$ {{ $row->amount }}</td>
                  <td>
                      {!! Form::open(['method' => 'POST', 'route' => 'quotation.pay']) !!}
                          <input type="hidden" name="id" value="{{ $row->id }}">
                          <button type="submit" name="button" class="btn btn-success">
                              <i class="fa fa-dollar"></i>
                          </button>
                      {!! Form::close() !!}
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Folios pagados"
        example="example3" color="box-success">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
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
                  <td>{{ $row->type }}</td>
                  <td>$ {{ $row->amount }}</td>
                  <td>{{ $row->date_payment }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
