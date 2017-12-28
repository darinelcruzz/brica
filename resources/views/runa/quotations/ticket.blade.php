@extends('runa')

@section('main-content')

    <section class="invoice">

        <div align="center">
            <h3>Runa Aceros</h3>
            <p>Panamericana 1262, Chichima Guadalupe, <br>
                Centro, CP. 30000, <br>
                Comitán de Domínguez, Chiapas<br>
                Tel.: 01-(963)-63-2-0405
            </p>
        </div>

        <h5><b>Cliente:</b> {{ $quotation->clientr->uppercase_name }}</h5>
        <h5><b>Folio:</b> {{ $quotation->folio }} </h5>
        <h5><b>Fecha:</b> {{ Jenssegers\Date\Date::now()->format('d/M/Y h:i a') }} </h5>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Descripción</th>
                    <th>Importe</th>
                </tr>
            </thead>

            <tbody>
                @if ($quotation->pay  == 'anticipo')
                    <tr>
                        <td></td>
                        <td>Anticipo</td>
                        <td>{{ $quotation->retainer }}</td>
                    </tr>
                @else
                    @foreach (unserialize($quotation->products) as $product)
                        <tr>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ App\Product::find($product['material'])->name }}</td>
                            <td>$ {{ number_format($product['total'], 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>

            <tfooter>
                @if ($quotation->clientr->discount > 0 && $quotation->pay !== 'anticipo')
                    <tr>
                        <th></th>
                        <th>Subtotal:</th>
                        <th>$ {{ $amount }} </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Descuento: </th>
                        <th>$ {{ $quotation->clientr->discount * $amount / 100 }} </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Total:</th>
                        <th>$ {{ $quotation->amount }} </th>
                    </tr>
                @else
                    <tr>
                        <th></th>
                        <th>Total: </th>
                        <th>{{ $quotation->retainer }}</th>
                    </tr>
                @endif
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
