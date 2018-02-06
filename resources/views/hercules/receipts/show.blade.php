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
                        <strong>{{ $hreceipt->name }}</strong><br>
                        {{ $hreceipt->clientr->address }}<br>
                        {{ $hreceipt->clientr->city }}<br>
                        {{ $hreceipt->clientr->phone }}<br>
                        {{ $hreceipt->clientr->email }}
                      </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                      Por el concepto de:
                      <address>
                        <strong>{{ $hreceipt->bodywork ? $hreceipt->bodyworkr->description: 'REPARACIÓN' }}</strong><br>
                        ({{ $hreceipt->formatted_amount }})<br>
                        <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ $hreceipt->color }} <br>
                        Entrega: <br>
                        <b>{{ $hreceipt->deliver }}</b>
                      </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                      La cantidad de:
                      <address>
                        @if ($hreceipt->order)
                            @if ($hreceipt->order->status == 'pagado' && $hreceipt->retainer == 0)
                                <strong>{{ '$ ' . number_format($hreceipt->amount, 2) }}</strong><br>
                                Restante:<br>
                                <b>$ 0.00</b>
                            @else
                                <strong>{{ '$ ' . number_format($hreceipt->deposit, 2) }}</strong><br>
                                Restante:<br>
                                <b>{{ $hreceipt->rest }}</b>
                            @endif
                        @else
                            <strong>{{ '$ ' . number_format($hreceipt->deposit, 2) }}</strong><br>
                            Restante:<br>
                            <b>{{ $hreceipt->rest }}</b>
                        @endif
                        <br>
                        Modelo:<br>
                        <strong>{{ $hreceipt->model or $hreceipt->order->model }}</strong>
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
