@extends('admin')

@section('main-content')

    <div align="center">
        <h3 align >Runa Aceros</h3>
        <p>Panamericana 1262, Chichima Guadalupe, <br>
            Centro, CP. 30000, <br>
            Comitán de Domínguez, Chiapas<br>
            Tel.: 01-(963)-63-2-0405
        </p>
    </div>

    <h5>Cliente: {{ $sale->quotationr->clientr->name }}</h5>
    <h5>Folio: {{ $sale->id }} </h5>
    <h5>Fecha: {{ $sale->created_at }} </h5>

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Descripción</th>
                    <th>Importe</th>
                </tr>
            </thead>

            @if ($sale->quotationr->type  == 'produccion')
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Subtotal: </th>
                        <th> ${{ $sale->amount }} </th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>Anticipo: </th>
                        <th> ${{ $sale->retainer }} </th>
                    </tr>
                </tbody>

            @else
                <tbody>
                    @if(unserialize($sale->quotationr->products))
                        @foreach (unserialize($sale->quotationr->products) as $product)
                            <tr>
                                <th>{{ $product['quantity'] }}</th>
                                <th>{{ App\Product::find($product['material'])->name }}</th>
                                <th>$ {{ $product['total'] }}</th>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            @endif

            <tfooter>
                <tr>
                    <th></th>
                    <th>Total</th>
                    @if ($sale->quotationr->type  == 'produccion')
                        <th>$ {{ $sale->amount - $sale->retainer }} </th>
                    @else
                        <th>${{ $sale->amount }}</th>
                    @endif
                </tr>
            </tfooter>
        </table>
    </div>

    <div class="row no-print">
        <button onclick="printTicket()" class="btn btn-default">
            <i class="fa fa-print"></i> Imprimir
        </button>
    </div>

    <script>
    function printTicket() {
        window.print();
    }
    </script>

@endsection
