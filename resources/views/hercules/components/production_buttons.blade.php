@if ($order->receiptr->client == 1)
    <a href="{{ route('hercules.receipt.edit', ['id' => $order->receipt]) }}"
        class="btn btn-{{ $process['color'] }} btn-xs">
        <i class="fa fa-user" aria-hidden="true"></i>
    </a>
@endif
@if ($order->serial_number)
    &nbsp;&nbsp;
    <a href="{{ route('hercules.order.print_ticket', ['id' => $order->id]) }}"
        class="btn btn-{{ $process['color'] }} btn-xs">
        <i class="fa fa-print" aria-hidden="true" title="IMPRIMIR TICKET"></i>
    </a>
@else
    &nbsp;&nbsp;
    <a href="{{ route('hercules.order.ticket', ['id' => $order->id, 'assigned' => $process['english']]) }}"
        class="btn btn-{{ $process['color'] }} btn-xs" title="GENERAR TICKET">
        <i class="fa fa-pencil" aria-hidden="true"></i>
    </a>
@endif
@if ($order->serial_number)
    <br><code>{{ $order->serial_number }}</code>
@endif
@if ($order->receiptr->type == 'reparacion')

@elseif ($order->receiptr->type == 'redila')
    <p class="text-light-blue">REDILA</p>
@else
    <p class="text-green">REMOLQUE</p>
@endif
