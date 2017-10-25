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
                        <td><strong>Entrega (estimada):</strong>  {{ $order->receiptr->deliver_date }}</td>
                    </tr>
                    @if ($order->bodywork)
                        <tr>
                            <td><strong>Inicio:</strong>  {{ $order->start }}</td>
                            <td><strong>Término:</strong>  {{ $order->end }}</td>
                        </tr>
                        <tr>
                            <td><strong>Carrocería tipo:</strong>  {{ $order->bodyworkr->description }}</td>
                            <td><strong>No. serie:</strong>  {{ $order->serial_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Marca:</strong>  {{ $order->brand }}</td>
                            <td><strong>Modelo:</strong>  {{ $order->model }}</td>
                        </tr>
                        <tr>
                            <td><strong>Largo:</strong>  {{ $order->bodyworkr->length }} m.</td>
                            <td><strong>Ancho chasis:</strong>  {{ $order->chasis }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alto:</strong>  {{ $order->bodyworkr->height }} m.</td>
                            <td><strong>Piso:</strong>  {{ $order->floor }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ancho:</strong>  {{ $order->bodyworkr->width }} m.</td>
                            <td><strong>Vestido:</strong>  {{ $order->clothing_spec }}</td>
                        </tr>
                    @else
                        <tr>
                            <td><strong>No. serie:</strong>  {{ $order->serial_number }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="2"><strong>Observaciones:</strong>  {{ $order->bodywork ? $order->receiptr->observations: $order->observations }}</td>
                    </tr>
                    <tr>
                        <td><strong>Soldador:</strong> {{ $order->welding }}</td>
                        <td><strong>Supervisor:</strong> {{ $order->supervisor }}</td>
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
