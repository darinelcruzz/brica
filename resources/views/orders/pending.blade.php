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
            @foreach($pending as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->deliver_date }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones no asignadas"
        example="example2" color="box-primary">
        <template slot="header">
            <tr>
                <th>Cotización</th>
                <th>Cliente</th>
                <th>Descripción</th>
                <th>Entrega</th>
                <th>Asignar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($completed as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->clientr->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>{{ $row->deliver_date }}</td>
                  <td>
                      {!! Form::open(['method' => 'POST', 'route' => 'production.assign']) !!}
                          <input type="hidden" name="id" value="{{ $row->id }}">
                          <div class="input-group">
                              {!! Field::select('team', ['R1'=>'R1', 'R2'=>'R2', 'R3'=>'R3'], null) !!}
                              <button type="submit" name="button" class="btn btn-success">
                                  <i class="fa fa-check"></i>
                              </button>
                          </div>
                      {!! Form::close() !!}
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones en cola"
        example="example3" color="box-warning">
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
                  <td>{{ $row->deliver_date }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cotizaciones en producción"
        example="example4" color="box-default">
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

    <data-table col="col-md-12" title="Cotizaciones finalizadas"
        example="example5" color="box-success">
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
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
