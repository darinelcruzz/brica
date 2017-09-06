@php
  use App\Models\Hercules\HItem;
@endphp

<div class="tab-pane {{ $tab == 1 ? 'active': '' }}" id="tab_{{ $tab }}">
    @if ($process != 'N;')
        <ul style="list-style-type: none;">
            @foreach (unserialize($process) as $id => $quantity)
                <li style="text-decoration: {{ array_search($horder->status, $status) > $number ? 'line-through': 'none'}}">
                  @if (array_search($horder->status, $status) > $number)
                    <i class="fa fa-check" aria-hidden="true"></i>&nbsp;
                  @else
                    <input type="checkbox"> &nbsp;
                  @endif
                    <b>{{ $quantity }}</b> &nbsp; {{ HItem::find($id)->description }} {{ HItem::find($id)->caliber}}
                </li>
            @endforeach
            <br><br>
            @if (array_search($horder->status, $status) > $number)
                <li>
                  <a href="{{ route('hercules.warehouse') }}"
                    class="btn btn-success btn-xs">
                    Regresar <i class="fa fa-backward" aria-hidden="true"></i>
                  </a>
                </li>
            @else
                <li>
                  <a style="{{ array_search($horder->status, $status) < $number ? "pointer-events: none; display: inline-block;" : '' }}"
                    href="{{ route('hercules.order.status', ['id' => $horder->id, 'status' => "surtido $proceso"]) }}"
                    class="btn btn-primary btn-xs" {{ array_search($horder->status, $status) < $number ? " disabled" : '' }}>
                    Listo <i class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </li>
            @endif
        </ul>
    @endif
</div>
