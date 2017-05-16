@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-10">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Historial de ordenes</h3>
                </div>
                
                <div class="box-body">
                    <table class="table table-striped">
        				<thead>
        					<tr>
                                <th>Orden</th>
        				       	<th>Equipo</th>
        				        <th>Descripción</th>
        				        <th>Fecha Inicio</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($orders as $order)
        				      <tr>
                                <td>{{ $order->id }}</td>
        				        <td>{{ $order->team }}</td>
        				        <td>{{ $order->description }}</td>
        				        <td>{{ $order->created_at->format('l jS \\of F Y  H:i:s') }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection
