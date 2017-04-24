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
        				       	<th>Equipo</th>
        				        <th>Cliente</th>
        				        <th>Peso</th>
        				        <th>Fecha</th>
        				        <th>Importe
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($orders as $order)
        				      <tr>
        				        <td>{{ $order->team }}</td>
        				        <td>{{ $order->client }}</td>
        				        <td>{{ $order->weight }}</td>
        				        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $order->date)->format('l jS \\of F Y') }}</td>
        				        <td>{{ $order->amount }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection
