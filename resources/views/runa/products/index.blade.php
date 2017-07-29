@extends('runa')

@section('main-content')

<data-table col="col-md-8" title="Productos"
    example="example2" color="box-warning">
    <template slot="header">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Price</th>
            <th>Familia</th>
        </tr>
    </template>

    <template slot="body">
        @foreach($products as $product)
          <tr>
              <td>{{ $product->id }}</td>
              <td>
                  {{ ucfirst($product->name) }} &nbsp;
                  <a href="{{ route('runa.product.edit', ['id' => $product->id]) }}">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                  </a>
              </td>
              <td>{{ $product->quantity }} ({{ $product->unity }})</td>
              <td>{{ $product->formatted_price }}</td>
              <td>{{ $product->family }}</td>
          </tr>
        @endforeach
    </template>
</data-table>

@endsection
