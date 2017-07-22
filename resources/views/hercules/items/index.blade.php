@extends('hercules')

@section('main-content')

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
            </tr>
        </template>

        <template slot="body">
            @foreach($items as $item)
              <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->description }}</td>
                  <td>{{ $item->caliber }}</td>
                  <td>{{ $item->unity }}</td>
                  <td>{{ $item->weight }}</td>
                  <td>{{ $item->price }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
