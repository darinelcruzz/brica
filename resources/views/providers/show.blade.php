@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado Proveedores</h3>
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
        					@foreach($providers as $provider)
        				      <tr>
        				        <td>{{ $provider->id }}</td>
        				        <td>{{ $provider->name }}</td>
        				        <td>{{ $provider->rfc }}</td>
        				        <td>{{ $provider->city }}</td>
        				        <td>{{ $provider->phone }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>{{ $provider->contact }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection
