@extends('hercules')

@section('main-content')

    <row-woc col="col-md-12">
        <solid-box title="Detalles venta producto terminado" color="box-primary">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Artículo</th>
                      <th>Calibre</th>
                      <th>Cantidad</th>
                      <th>Precio Unitario</th>
                      <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($hstocksale->products_array as $product)
                        @php
                            $item = App\Models\Hercules\HItem::find($product['i']);
                        @endphp
                        <tr>
                          <td>{{ $item->description }}</td>
                          <td>{{ $item->caliber }}</td>
                          <td>{{ $product['q'] }}</td>
                          <td>{{ '$ ' . number_format($product['t'] / $product['q'], 2) }}</td>
                          <td>{{ '$ ' . number_format($product['t'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Total:</b></td>
                        <td>{{ $hstocksale->amount }}</td>
                    </tr>
                </tfoot>
            </table>
        </solid-box>
    </row-woc>
@endsection
