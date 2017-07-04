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

    <h5>Cliente: {{ $quotation->clientr->name }}</h5>
    <h5> Folio: {{ $quotation->id }} </h5>
    <h5> Fecha: {{ $date }} </h5>

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Descripción</th>
                    <th>Importe</th>
                </tr>
            </thead>

            @if ( $quotation->pay  == 'anticipo' )
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Anticipo</th>
                        <th> ${{ $quotation->amount }} </th>
                    </tr>
                </tbody>

            @else
                <tbody>
                    @foreach (unserialize($quotation->products) as $product)
                        <tr>
                            <th>{{ $product['quantity'] }}</th>
                            <th>{{ App\Product::find($product['material'])->name }}</th>
                            <th>$ {{ $product['total'] }}</th>
                        </tr>
                    @endforeach
                </tbody>
            @endif

            <tfooter>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th>$ {{ $quotation->amount }} </th>
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
