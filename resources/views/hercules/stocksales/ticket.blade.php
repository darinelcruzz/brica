@extends('hercules')

@section('main-content')

    <section class="invoice">

        <div align="center">
            <h3 align >Carrocerías Hercules</h3>
            <p>Panamericana 1262, Chichima Guadalupe, <br>
                Centro, CP. 30000, <br>
                Comitán de Domínguez, Chiapas<br>
                Tel.: 01-(963)-63-2-0405
            </p>
        </div>

        <div class="row">
            <h5><b>Cliente:</b> {{ $hstocksale->name }}</h5>
            <h5><b>Folio:</b> {{ $hstocksale->id }} </h5>
            <h5><b>Fecha:</b> {{ substr($hstocksale->date, 0, 10) }} </h5>
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
                @foreach (unserialize($hstocksale->products) as $product)
                    @php
                        $item = App\Models\Hercules\HItem::find($product['i'])
                    @endphp
                    <tr>
                        <td>
                            {{ $product['q'] }}
                            {{ $item->unity . ($item->unity == 'PIEZA' ? 'S': '') }}
                        </td>
                        <td>{{ $item->description }}</td>
                        <td>$ {{ number_format($product['t'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfooter>
                <tr><th></th><th>Total: </th><th>{{ '$ ' . number_format($hstocksale->total, 2) }}</th></tr>
            </tfooter>
        </table>

        <div class="row no-print">
            <button onclick="printTicket()" class="btn btn-primary pull-right">
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
