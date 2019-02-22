@extends('runa')

@section('main-content')

    <section class="invoice">

        <div align="center">
            <h3 align >Runa Aceros</h3>
            <p>Panamericana 1262, Chichima Guadalupe, <br>
                Centro, CP. 30000, <br>
                Comitán de Domínguez, Chiapas<br>
                Tel.: 01-(963)-63-2-0405
            </p>
        </div>

        <div class="row">
            <h5><b>Cliente:</b> {{ $sale->quotationr->clientr->uppercase_name }}</h5>
            <h5><b>Folio:</b> {{ $sale->quotationr->folio or '' }} </h5>
            <h5><b>Fecha:</b> {{ $sale->sale_date }} </h5>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Importe</th>
                </tr>
            </thead>

            <tbody>
                @if ($sale->quotationr->products)
                    @foreach (unserialize($sale->quotationr->products) as $product)
                        <tr>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ App\Product::find($product['material'])->name }}</td>
                            <td>$ {{ number_format($product['total'], 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                @endif

                @if ($sale->quotationr->type  == 'produccion')

                        @if ($sale->quotationr->clientr->discount > 0)
                            <tr>
                                <th></th>
                                <th>Subtotal: </th>
                                <td>$ {{ $sale->amount * 100 / (100 - $sale->quotationr->clientr->discount) }} </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Descuento: </th>
                                <td>$ {{ $sale->amount * 100 / (100 - $sale->quotationr->clientr->discount) * $sale->quotationr->clientr->discount / 100 }} </td>
                            </tr>
                        @else
                            <tr>
                                <th></th>
                                <th>Subtotal: </th>
                                <td>$ {{ number_format($sale->amount, 2, '.', ',') }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th></th>
                            <th>Anticipo: </th>
                            <td>$ {{ number_format($sale->retainer, 2, '.', ',') }}</td>
                        </tr>
                @endif

            </tbody>

            <tfooter>
                <tr><th></th><th>Total: </th><th>{{ $sale->sale_total }}</th></tr>
            </tfooter>
        </table>

        <div class="row no-print">
            <button onclick="printTicket()" class="btn btn-warning pull-right">
                <i class="fa fa-print"></i> Imprimir
            </button>
        </div>
    </section>

    <script>
    function printTicket() {
        window.print();
    }
    </script>

@endsection
