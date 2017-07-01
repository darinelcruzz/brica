@extends('admin')

@section('main-content')

    <data-table col="col-md-12"
        title="Órdenes pendientes" example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Detalle</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($pending as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->type}}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      <a href="{{ route('production.operatorOrder', ['id' => $row->id]) }}"
                          class="btn btn-success">
                              <i class="fa fa-play"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
