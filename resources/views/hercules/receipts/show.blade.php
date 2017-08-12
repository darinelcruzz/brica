@extends('hercules')

@section('main-content')

    <row-woc col="col-md-12">

        <row-woc col="col-md-12">
            <section class="invoice">

                <div class="row">
                    <div class="col-xs-12">
                      <h2 class="page-header" align="center">
                          Carrocerías Hercules
                          <small>
                              IRENE DE LOURDES LÓPEZ GARCÍA <br>
                              Panamericana 1262, Chichima Guadalupe, <br>
                              Centro, CP. 30000, <br>
                              Comitán de Domínguez, Chiapas<br>
                              Tel.: 01-(963)-63-2-0405
                          </small>
                      </h2>
                    </div>
                </div>

                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      Recibí de:
                      <address>
                        <strong>{{ $hreceipt->clientr->name }}</strong><br>
                        {{ $hreceipt->clientr->address }}<br>
                        {{ $hreceipt->clientr->city }}<br>
                        {{ $hreceipt->clientr->phone }}<br>
                        {{ $hreceipt->clientr->email }}
                      </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                      Por el concepto de:
                      <address>
                        <strong>{{ $hreceipt->bodyworkr->description }}</strong><br>
                        ({{ '$ ' . number_format($hreceipt->bodyworkr->computeTotal(), 2, '.', ',') }})<br>
                        <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ $hreceipt->color }} <br>
                        Entrega: <br>
                        <b>{{ $hreceipt->deliver }}</b>
                      </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                      La cantidad de:
                      <address>
                        <strong>{{ '$ ' . number_format($hreceipt->retainer, 2, '.', ',') }}</strong><br>
                        Restante:<br>
                        <b>{{ '$ ' . number_format($hreceipt->bodyworkr->computeTotal() - $hreceipt->retainer, 2, '.', ',') }}</b>
                      </address>
                    </div>
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
