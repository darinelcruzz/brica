@extends('hercules')

@section('main-content')

    @php
      use App\Models\Hercules\HItem;
    @endphp

    <row-woc col="col-md-12">
        <solid-box title="A surtir"
            color="box-primary">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Soldadura</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Fondeo</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Vestido</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Pintura</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Montaje</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @if ($hbodywork->welding != 'N;')
                            <ul style="list-style-type: none;">
                                @foreach (unserialize($hbodywork->welding) as $id => $quantity)
                                    <li style="text-decoration: {{ $horder->status == 'pendiente' ? 'none': 'line-through'}}">
                                      @if ($horder->status == 'pendiente')
                                        <input type="checkbox"> &nbsp;
                                      @else
                                        <i class="fa fa-check" aria-hidden="true"></i>&nbsp;
                                      @endif
                                        <b>{{ $quantity }}</b> &nbsp; {{ HItem::find($id)->description }}
                                    </li>
                                @endforeach
                                <br><br>
                                @if ($horder->status == 'pendiente')
                                  <li>
                                    <a href="{{ route('hercules.order.status', ['id' => $horder->id, 'status' => 'surtido']) }}"
                                      class="btn btn-primary btn-xs">
                                      Listo <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                  </li>
                                @endif
                            </ul>
                        @endif
                    </div>

                    <div class="tab-pane" id="tab_2">
                        @if ($hbodywork->anchoring != 'N;')
                            <ul style="list-style-type:none;">
                                @foreach (unserialize($hbodywork->anchoring) as $id => $quantity)
                                    <li>
                                        <input type="checkbox"> &nbsp;
                                        <b>{{ $quantity }}</b> &nbsp; {{ HItem::find($id)->description }}
                                    </li>
                                @endforeach
                                <br><br>
                                <li>
                                  <a href="#"
                                    class="btn btn-primary btn-xs">
                                    Listo <i class="fa fa-check" aria-hidden="true"></i>
                                  </a>
                                </li>
                            </ul>
                        @endif
                    </div>

                    <div class="tab-pane" id="tab_3">
                        @if ($hbodywork->clothing != 'N;')
                            <ul style="list-style-type:none;">
                                @foreach (unserialize($hbodywork->clothing) as $id => $quantity)
                                    <li>
                                        <input type="checkbox"> &nbsp;
                                        <b>{{ $quantity }}</b> &nbsp; {{ HItem::find($id)->description }}
                                    </li>
                                @endforeach
                                <br><br>
                                <li>
                                  <a href="#"
                                    class="btn btn-primary btn-xs">
                                    Listo <i class="fa fa-check" aria-hidden="true"></i>
                                  </a>
                                </li>
                            </ul>
                        @endif
                    </div>

                    <div class="tab-pane" id="tab_4">
                        @if ($hbodywork->painting != 'N;')
                            <ul style="list-style-type:none;">
                                @foreach (unserialize($hbodywork->painting) as $id => $quantity)
                                    <li>
                                        <input type="checkbox"> &nbsp;
                                        <b>{{ $quantity }}</b> &nbsp; {{ HItem::find($id)->description }}
                                    </li>
                                @endforeach
                                <br><br>
                                <li>
                                  <a href="#"
                                    class="btn btn-primary btn-xs">
                                    Listo <i class="fa fa-check" aria-hidden="true"></i>
                                  </a>
                                </li>
                            </ul>
                        @endif
                    </div>

                    <div class="tab-pane" id="tab_5">
                        @if ($hbodywork->mounting != 'N;')
                            <ul style="list-style-type:none;">
                                @foreach (unserialize($hbodywork->mounting) as $id => $quantity)
                                    <li>
                                        <input type="checkbox"> &nbsp;
                                        <b>{{ $quantity }}</b> &nbsp; {{ HItem::find($id)->description }}
                                    </li>
                                @endforeach
                                <br><br>
                                <li>
                                  <a href="#"
                                    class="btn btn-primary btn-xs">
                                    Listo <i class="fa fa-check" aria-hidden="true"></i>
                                  </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

        </solid-box>
    </row-woc>

@endsection
