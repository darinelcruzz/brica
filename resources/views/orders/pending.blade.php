@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Órdenes pendientes</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
        				<thead>
        					<tr>
                                <th>#</th>
        				       	<th>Cliente</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
        				        <th>Equipo</th>
                                <th>Pago</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($pending as $order)
        				      <tr>
                                <td>{{ $order->id }}</td>
        				        <td>{{ $order->client }}</td>
                                <td>{{ $order->type }}</td>
        				        <td>{{ $order->description }}</td>
                                <td>{{ $order->team }}</td>
                                <td>
                                    {!! Form::open(['method' => 'POST', 'route' => 'order.pay']) !!}
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        {!! Field::number('advance',
                                            ['tpl' => 'templates/inlinebutton', 'ph' => '0.0', 'min' => 0])!!}
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
            <div class="box box-solid box-warning collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Órdenes autorizadas</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
        				<thead>
        					<tr>
                                <th>#</th>
        				       	<th>Cliente</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
        				        <th>Equipo</th>
                                <th>Anticipo</th>
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
                                <td>{{ $order->advance }}</td>
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
            <div class="box box-solid box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Órdenes finalizadas</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <table id="example3" class="table table-bordered table-striped">
        				<thead>
        					<tr>
                                <th>#</th>
        				       	<th>Cliente</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
        				        <th>Equipo</th>
                                <th>Inicio</th>
                                <th>Final</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($terminated as $order)
        				      <tr>
                                <td>{{ $order->id }}</td>
        				        <td>{{ $order->client }}</td>
                                <td>{{ $order->type }}</td>
        				        <td>{{ $order->description }}</td>
                                <td>{{ $order->team }}</td>
                                <td>{{ $order->startTime }}</td>
                                <td>{{ $order->endTime }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection
