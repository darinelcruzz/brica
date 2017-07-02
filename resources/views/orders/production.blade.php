@extends('admin')

@section('main-content')
    <data-table col="col-md-12" title="Cotizaciones pendientes" example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th># órdenes</th>
                <th>Entrega</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($pending as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ count($row->orders) }}</td>
                  <td>{{ $row->deliver }}</td>
                  <td>
                      <a href="{{ route('production.create', ['cot' => $row->id]) }}" class="btn btn-success">+</a>
                      <a href="{{ route('production.complete', ['cot' => $row->id]) }}" class="btn btn-primary">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones no asignadas" example="example2"
    color="box-default" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Entrega</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($completed as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->deliver }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones en cola" example="example3"
    color="box-danger" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Equipo</th>
                <th>Entrega</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($authorized as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->team }}</td>
                  <td>{{ $row->deliver }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones en producción" example="example4"
    color="box-warning">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Equipo</th>
                <th>Inicio</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($production as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->clientr->name }}</td>
                <td>{{ $row->description }}</td>
                <td>{{ $row->team }}</td>
                <td>{{ $row->startTime }}</td>
            </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones finalizadas" example="example5"
    color="box-success" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Equipo</th>
                <th>Inicio</th>
                <th>Final</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($terminated as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->clientr->name }}</td>
                <td>{{ $row->description }}</td>
                <td>{{ $row->team }}</td>
                <td>{{ $row->startTime }}</td>
                <td>{{ $row->endTime }}</td>
            </tr>
            @endforeach
        </template>
    </data-table>

@endsection
