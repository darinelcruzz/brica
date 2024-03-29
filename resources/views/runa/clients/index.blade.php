@extends('runa')

@section('main-content')

    <data-table col="col-md-12" title="Clientes"
        example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>R.F.C.</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Contacto</th>
                <th></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($clients as $client)
              <tr>
                  <td>{{ $client->id }}</td>
                  <td>
                      {{ $client->name }}
                      @if ($client->credit)
                          <code><i class="fa fa-credit-card" aria-hidden="true"></i></code>
                      @endif
                  </td>
                  <td>{{ $client->rfc }}</td>
                  <td>{{ $client->address }}</td>
                  <td>{{ $client->phone }}</td>
                  <td>{{ $client->email }}</td>
                  <td>{{ $client->contact }}</td>
                  <td>
                      <a href="{{ route('runa.client.edit', $client) }}">
                          <i class="fa fa-edit"></i>
                      </a>
                      @if (count($client->quotations) < 1)
                          <a href="{{ route('runa.client.destroy', $client) }}">
                              <i class="fa fa-trash"></i>
                          </a>
                      @endif
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
