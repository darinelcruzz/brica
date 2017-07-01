@extends('admin')

@section('main-content')

    <!--div class="row">
        @ include('table', ['rows' => $pending,
                'header' => ['#', 'Cliente', 'Descripción', 'Fecha entrega'],
                'color' => 'danger', 'title' => 'Cotizaciones pendientes', 'example' => '1',
                'extra' => 'templates/add'])
    </div-->

    <data-table col="col-md-12" title="Cotizaciones pendientes" example="example1">
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
                  <td></td>
                  <td>{{ count($row->orders) }}</td>
                  <td></td>
                  <td>
                      <a href="{{ route('production.create', ['cot' => $row->id]) }}" class="btn btn-success">+</a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <div class="row">
        @include('table', ['rows' => $completed,
        		'header' => ['#', 'Cliente', 'Descripción', 'Fecha entrega'],
                'color' => 'danger', 'title' => 'Cotizaciones no asignadas', 'example' => '2', 'collapsed' => 'collapsed'])

    </div>

    <div class="row">
        @include('table', ['rows' => $authorized,
            	'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Fecha entrega'],
            	'color' => 'danger', 'title' => 'Cotizaciones en cola', 'example' => '3'])
    </div>

    <div class="row">
        @include('table', ['rows' => $production,
            	'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Inicio',],
            	'color' => 'warning', 'title' => 'Cotizaciones en producción', 'example' => '4'])
    </div>

    <div class="row">
        @include('table', ['rows' => $terminated,
            	'header' => ['#', 'Cliente', 'Descripción', 'Equipo', 'Inicio', 'Final'],
                'color' => 'success', 'title' => 'Cotizaciones finalizadas', 'example' => '5', 'collapsed' => 'collapsed'])
    </div>

@endsection
