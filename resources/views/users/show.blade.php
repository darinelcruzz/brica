@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado Usuarios</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
        				<thead>
        					<tr>
        				       	<th>ID</th>
        				        <th>Nombre</th>
                                <th>Usuario</th>
        				        <th>Contraseña</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($users as $user)
        				      <tr>
        				        <td>{{ $user->id }}</td>
        				        <td>{{ $user->name }}</td>
                                <td>{{ $user->user }}</td>
        				        <td>{{ $user->password }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection