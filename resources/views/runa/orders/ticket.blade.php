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

        <h5><b>Fecha:</b> {{ Jenssegers\Date\Date::now()->format('d/M/Y h:i a') }} </h5>


        <table class="table">
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Descripción</th>
                    <th>Importe</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Corte simple</td>
                    <td>$ {{ number_format($rcut->amount, 2) }}</td>
                </tr>
            </tbody>
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