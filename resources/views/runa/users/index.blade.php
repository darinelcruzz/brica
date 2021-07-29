@extends('runa')

@section('main-content')

    <data-table col="col-md-8" title="Usuarios" example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th><i class="fa fa-edit"></i></th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Nivel</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($users as $user)
              <tr>
                  <td><b>{{ ['B', 'R', 'H'][$user->user] }}</b>{{ sprintf("%02d", $user->id) }}</td>
                  <td>
                      <a href="{{ route('runa.user.edit', $user) }}" class="btn btn-xs btn-warning">
                          <i class="fa fa-edit"></i>
                      </a>
                  </td>
                  <td>{{ ucwords(strtolower($user->name)) }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ ['Admin', 'Ventas', 'Gerente', 'Ingeniero', 'Operador', 'Otros'][$user->level - 1] }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
