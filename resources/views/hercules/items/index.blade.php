@extends('hercules')

@section('main-content')

    <row-woc col="col-md-3">
        <a href="{{ route('hercules.item.create') }}" class="btn btn-app">
            <span class="badge bg-aqua">{{ count($items) }}</span>
            <i class="fa fa-edit"></i> Agregar
        </a>
    </row-woc>

    <data-table col="col-md-12" title="Artículos"
        example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>No.</th>
                <th>Descripción</th>
                <th>Calibre</th>
                <th>Unidad</th>
                <th>Peso</th>
                <th>Precio</th>
                <th>Procesos</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($items as $item)
              <tr>
                  <td>{{ $item->id }}</td>
                  <td>
                    {{ $item->description }} &nbsp;
                    <a href="{{ route('hercules.item.edit', ['id' => $item->id ])}}"
                      title="EDITAR">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                  </td>
                  <td>{{ $item->caliber }}</td>
                  <td>{{ $item->unity }}</td>
                  <td>{{ $item->weight }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->processes }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
