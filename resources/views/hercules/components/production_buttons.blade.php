@if ($order->receiptr->client == 1)
    <a href="{{ route('hercules.receipt.edit', ['id' => $order->receipt]) }}"
        class="btn btn-{{ $process['color'] }} btn-xs">
        <i class="fa fa-user" aria-hidden="true"></i>
    </a>
@endif
@if ($order->serial_number)
    <br><code>{{ $order->serial_number }}</code>
@endif
@if ($order->receiptr->type == 'reparacion')
    <p class="text-red">REPARACIÓN</p>
@elseif ($order->receiptr->type == 'redila')
    <p class="text-light-blue">REDILA</p>
@else
    <p class="text-green">REMOLQUE</p>
@endif
