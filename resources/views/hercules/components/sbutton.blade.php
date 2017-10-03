<a style="{{ !$order->isOkToMove($process) ? "pointer-events: none; display: inline-block;" : '' }}"
    href="{{ route('hercules.order.status', ['id' => $order->id, 'status' => $process['next']['s']]) }}"
    class="btn btn-{{ $process['color'] }} btn-xs" {{ !$order->isOkToMove($process) ? " disabled" : '' }}>
    {{ ucfirst($process['next']['s']) }}
    <i class="fa fa-forward" aria-hidden="true"></i>
</a>
