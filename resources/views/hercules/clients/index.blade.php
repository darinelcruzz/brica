@extends('hercules')

@section('main-content')

    <data-table col="col-md-12" title="Clientes"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>R.F.C.</th>
                <th>Ubicación</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Contacto</th>
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
                      <a href="{{ route('hercules.client.edit', ['id' => $client->id]) }}">
                          <i class="fa fa-edit"></i>
                      </a>
                      @if (auth()->user()->level == 1 && count($client->receipts) < 1)
                          <a href="{{ route('hercules.client.destroy', ['id' => $client->id]) }}">
                              <i class="fa fa-trash"></i>
                          </a>
                      @endif
                  </td>
                  <td>{{ $client->rfc }}</td>
                  <td>
                      {{ $client->address }} {{ $client->city }}
                  </td>
                  <td>{{ $client->phone }}</td>
                  <td>{{ $client->email }}</td>
                  <td>
                      {{ $client->contact }} <br>
                      {{ $client->contact_number }}
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
