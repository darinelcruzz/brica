@extends('hercules')

@section('main-content')

    <row-woc col="col-md-12">

        <row-woc col="col-md-12">
            <section class="invoice">

                <div class="row">
                    <div class="col-xs-12">

                      <pre style="background: #efefef;border: 1px #777;background: url(lines.png) repeat 0 0;">





                      </pre>
                    </div>
                </div>

                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      Recibí de:
                      <address>
                        <strong>{{ $gondola->client->name }}</strong><br>
                        {{ $gondola->client->address }}<br>
                        {{ $gondola->client->city }}<br>
                        {{ $gondola->client->phone }}<br>
                        {{ $gondola->client->email }}
                      </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                      Por el concepto de:
                      <address>
                        <strong>{{ $gondola->brand }}</strong><br>
                        {{ $gondola->model }}<br>
                        <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ $gondola->color }} <br>
                        <b>{{ $gondola->code }}</b>
                      </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                      La cantidad de:
                      <address>
                        $ {{ number_format($gondola->retainer, 2) }}
                        <br>
                        Restante:<br>
                        <strong>$ {{ number_format($gondola->debt, 2) }}</strong>
                      </address>
                    </div>
                </div>
            </section>
        </row-woc>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <button onclick="printTicket()" class="btn btn-primary pull-right no-print">
                    <i class="fa fa-print"></i> Imprimir
                </button>
            </div>
        </div>

    </row-woc>

    <script>
        function printTicket() {
            window.print();
        }
    </script>
@endsection
