@extends('hercules')

@section('main-content')

    <row-woc col="col-md-12">

        <row-woc col="col-md-12">
            <section class="invoice">

                <div class="row">
                    <div class="col-xs-12">
                      <h2 class="page-header" align="center">
                          <img width="30%" height="20%" src="{{ asset('/img/hercules.png') }}">
                          <small><b><u>ORDEN DE TRABAJO</u></b></small>
                      </h2>
                    </div>
                </div>

                <table class="table">
                    <tr>
                        <td><strong>Entrega (estimada):</strong>  {{ $horder->receiptr->deliver }}</td>
                    </tr>
                    <tr>
                        <td><strong>Inicio:</strong>  {{ $horder->start }}</td>
                        <td><strong>Término:</strong>  {{ $horder->end }}</td>
                    </tr>
                    <tr>
                        <td><strong>Carrocería tipo:</strong>  {{ $horder->bodyworkr->description }}</td>
                        <td><strong>No. serie:</strong>  {{ $horder->length }}</td>
                    </tr>
                    <tr>
                        <td><strong>Marca:</strong>  {{ $horder->start }}</td>
                        <td><strong>Modelo:</strong>  {{ $horder->length }}</td>
                    </tr>
                    <tr>
                        <td><strong>Largo:</strong>  {{ $horder->bodyworkr->length }} m.</td>
                        <td><strong>Ancho chasis:</strong>  {{ $horder->length }}</td>
                    </tr>
                    <tr>
                        <td><strong>Alto:</strong>  {{ $horder->bodyworkr->height }} m.</td>
                        <td><strong>Piso:</strong>  {{ $horder->length }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ancho:</strong>  {{ $horder->bodyworkr->width }} m.</td>
                        <td><strong>Vestido:</strong>  {{ $horder->length }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Observaciones:</strong>  {{ $horder->receiptr->observations }}</td>
                    </tr>
                    <tr>
                        <td><strong>Soldador:</strong></td>
                        <td><strong>Supervisor:</strong></td>
                    </tr>
                </table>

                <div class="row invoice-info">
                </div>
            </section>
        </row-woc>

        <row-woc col="col-md-12">
            <button onclick="printTicket()" class="btn btn-primary pull-right no-print">
                <i class="fa fa-print"></i> Imprimir
            </button>
        </row-woc>

    </row-woc>

    <script>
        function printTicket() {
            window.print();
        }
    </script>
@endsection
