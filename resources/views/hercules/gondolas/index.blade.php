@extends('hercules')

@section('main-content')

    <row-woc col="col-md-3">
        <a href="{{ route('hercules.gondola.create') }}" class="btn btn-app">
            <span class="badge bg-aqua">{{ count($gondolas) }}</span>
            <i class="fa fa-puzzle-piece"></i> Agregar
        </a>
    </row-woc>

    <data-table col="col-md-12" title="Góndolas disponibles"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th><i class="fa fa-cogs"></i></th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Código</th>
                <th>Precio</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($gondolas as $gondola)
              @if ($gondola->status == "disponible")
                  <tr>
                      <td>{{ $gondola->id }}</td>
                      <td>
                          <dropdown color="primary" icon="cogs">
                              <ddi to="{{ route('hercules.gondola.quote', ['gondola' => $gondola->id]) }}"
                                  icon="dollar" text="Vender"></ddi>
                              <ddi to="{{ route('hercules.gondola.edit', ['gondola' => $gondola->id]) }}"
                                  icon="pencil-square-o" text="Editar"></ddi>
                          </dropdown>
                      </td>
                      <td>{{ $gondola->brand }}</td>
                      <td>{{ $gondola->model }}</td>
                      <td>{{ $gondola->color }}</td>
                      <td>{{ $gondola->code }}</td>
                      <td>$ {{ number_format($gondola->price, 2) }}</td>
                  </tr>
              @endif
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Góndolas vendidas"
        example="example1" color="box-warning">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Código</th>
                <th>Deuda</th>
                <th>Depositar</th>
                <th>Precio</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($gondolas as $gondola)
              @if ($gondola->status == "vendida")
                  <tr>
                      <td>{{ $gondola->id }}</td>
                      <td>
                          {{ $gondola->brand }}&nbsp;
                          <a href="{{ route('hercules.gondola.printTicket', ['gondola' => $gondola->id]) }}"
                              class="btn btn-xs btn-warning">
                              <i class="fa fa-print"></i>
                          </a>
                      </td>
                      <td>{{ $gondola->model }}</td>
                      <td>{{ $gondola->color }}</td>
                      <td>{{ $gondola->code }}</td>
                      <td>$ {{ number_format($gondola->debt, 2) }}</td>
                      <td>
                          @include('hercules.gondolas.add_deposit')
                      </td>
                      <td>$ {{ number_format($gondola->price, 2) }}</td>
                  </tr>
              @endif
            @endforeach
        </template>
    </data-table>

@endsection
