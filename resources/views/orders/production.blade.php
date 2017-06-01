@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-danger  collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Órdenes en cola</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
        				<thead>
        					<tr>
                                <th>#</th>
        				       	<th>Cliente</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
        				        <th>Equipo</th>
                                <th>A producción</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($authorized as $order)
        				      <tr>
                                <td>{{ $order->id }}</td>
        				        <td>{{ $order->client }}</td>
                                <td>{{ $order->type }}</td>
        				        <td>{{ $order->description }}</td>
                                <td>{{ $order->team }}</td>
                                <td>
                                    {!! Form::open(['method' => 'POST', 'route' => 'order.start']) !!}
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" name="button" class="btn btn-primary">
                                            <i class="fa fa-arrow-right"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Órdenes en producción</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
        				<thead>
        					<tr>
                                <th>#</th>
        				       	<th>Cliente</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
        				        <th>Equipo</th>
                                <th>Inicio</th>
                                <th>¿Terminado?</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($production as $order)
        				      <tr>
                                <td>{{ $order->id }}</td>
        				        <td>{{ $order->client }}</td>
                                <td>{{ $order->type }}</td>
        				        <td>{{ $order->description }}</td>
                                <td>{{ $order->team }}</td>
                                <td>{{ $order->startTime }}</td>
                                <td>
                                    {!! Form::open(['method' => 'POST', 'route' => 'order.finish']) !!}
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" name="button" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection
