@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado Ordenes de venta</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
        				<thead>
        					<tr>
        				       	<th>Num</th>
        				        <th>Cliente</th>
        				        <th>Descripción</th>
        				        <th>Equipo</th>
        				        <th>Total</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($solicitudes as $solicitude)
        				      <tr>
        				        <td>{{ $solicitude->id }}</td>
        				        <td>{{ $solicitude->client }}</td>
        				        <td>{{ $solicitude->description }}</td>
        				        <td>{{ $solicitude->team }}</td>
        				        <td>{{ $solicitude->total }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection