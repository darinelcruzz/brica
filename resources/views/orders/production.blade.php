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
                                <th>Hora</th>
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
                                <td></td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection