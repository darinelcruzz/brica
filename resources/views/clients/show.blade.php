@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado Clientes</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
        				<thead>
        					<tr>
        				       	<th>Num</th>
        				        <th>Nombre</th>
        				        <th>RFC</th>
        				        <th>Ciudad</th>
        				        <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Contacto</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($clients as $client)
        				      <tr>
        				        <td>{{ $client->id }}</td>
        				        <td>{{ $client->name }}</td>
        				        <td>{{ $client->rfc }}</td>
        				        <td>{{ $client->city }}</td>
        				        <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->contact }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection
